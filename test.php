<?php
class BorkageException extends Exception
{
}
class TestFile
{
    private string $fileName;

    private array $sections = ['TEST' => ''];

    private const ALLOWED_SECTIONS = [
        'EXPECT', 'EXPECTF', 'EXPECTREGEX', 'EXPECTREGEX_EXTERNAL', 'EXPECT_EXTERNAL', 'EXPECTF_EXTERNAL', 'EXPECTHEADERS',
        'POST', 'POST_RAW', 'GZIP_POST', 'DEFLATE_POST', 'PUT', 'GET', 'COOKIE', 'ARGS',
        'FILE', 'FILEEOF', 'FILE_EXTERNAL', 'REDIRECTTEST',
        'CAPTURE_STDIO', 'STDIN', 'CGI', 'PHPDBG',
        'INI', 'ENV', 'EXTENSIONS',
        'SKIPIF', 'XFAIL', 'XLEAK', 'CLEAN',
        'CREDITS', 'DESCRIPTION', 'CONFLICTS', 'WHITESPACE_SENSITIVE',
    ];

    /**
     * @throws BorkageException
     */
    public function __construct(string $fileName, bool $inRedirect)
    {
        $this->fileName = $fileName;

        $this->readFile();
        $this->validateAndProcess($inRedirect);
    }

    public function getAllSections(): array
    {
        return array_keys($this->sections);
    }

    public function hasSection(string $name): bool
    {
        return isset($this->sections[$name]);
    }

    public function hasAllSections(string ...$names): bool
    {
        foreach ($names as $section) {
            if (!isset($this->sections[$section])) {
                return false;
            }
        }

        return true;
    }

    public function hasAnySections(string ...$names): bool
    {
        foreach ($names as $section) {
            if (isset($this->sections[$section])) {
                return true;
            }
        }

        return false;
    }

    public function sectionNotEmpty(string $name): bool
    {
        return !empty($this->sections[$name]);
    }

    /**
     * @throws Exception
     */
    public function getSection(string $name): string
    {
        if (!isset($this->sections[$name])) {
            throw new Exception("Section $name not found");
        }
        return $this->sections[$name];
    }

    public function getName(): string
    {
        return trim($this->getSection('TEST'));
    }

    public function isCGI(): bool
    {
        return $this->hasSection('CGI')
            || $this->sectionNotEmpty('GET')
            || $this->sectionNotEmpty('POST')
            || $this->sectionNotEmpty('GZIP_POST')
            || $this->sectionNotEmpty('DEFLATE_POST')
            || $this->sectionNotEmpty('POST_RAW')
            || $this->sectionNotEmpty('PUT')
            || $this->sectionNotEmpty('COOKIE')
            || $this->sectionNotEmpty('EXPECTHEADERS');
    }

    /**
     * TODO Refactor to make it not needed
     */
    public function setSection(string $name, string $value): void
    {
        $this->sections[$name] = $value;
    }

    /**
     * Load the sections of the test file
     * @throws BorkageException
     */
    private function readFile(): void
    {
        $fp = fopen($this->fileName, "rb") or error("Cannot open test file: {$this->fileName}");

        if (!feof($fp)) {
            $line = fgets($fp);

            if ($line === false) {
                throw new BorkageException("cannot read test");
            }
        } else {
            throw new BorkageException("empty test [{$this->fileName}]");
        }
        if (strncmp('--TEST--', $line, 8)) {
            throw new BorkageException("tests must start with --TEST-- [{$this->fileName}]");
        }

        $section = 'TEST';
        $secfile = false;
        $secdone = false;

        while (!feof($fp)) {
            $line = fgets($fp);

            if ($line === false) {
                break;
            }

            // Match the beginning of a section.
            if (preg_match('/^--([_A-Z]+)--/', $line, $r)) {
                $section = (string) $r[1];

                if (isset($this->sections[$section]) && $this->sections[$section]) {
                    throw new BorkageException("duplicated $section section");
                }

                // check for unknown sections
                if (!in_array($section, self::ALLOWED_SECTIONS)) {
                    throw new BorkageException('Unknown section "' . $section . '"');
                }

                $this->sections[$section] = '';
                $secfile = $section == 'FILE' || $section == 'FILEEOF' || $section == 'FILE_EXTERNAL';
                $secdone = false;
                continue;
            }

            // Add to the section text.
            if (!$secdone) {
                $this->sections[$section] .= $line;
            }

            // End of actual test?
            if ($secfile && preg_match('/^===DONE===\s*$/', $line)) {
                $secdone = true;
            }
        }

        fclose($fp);
    }

    /**
     * @throws BorkageException
     */
    private function validateAndProcess(bool $inRedirect): void
    {
        // the redirect section allows a set of tests to be reused outside of
        // a given test dir
        if ($this->hasSection('REDIRECTTEST')) {
            if ($inRedirect) {
                throw new BorkageException("Can't redirect a test from within a redirected test");
            }
            return;
        }
        if (!$this->hasSection('PHPDBG') && $this->hasSection('FILE') + $this->hasSection('FILEEOF') + $this->hasSection('FILE_EXTERNAL') != 1) {
            throw new BorkageException("missing section --FILE--");
        }

        if ($this->hasSection('FILEEOF')) {
            $this->sections['FILE'] = preg_replace("/[\r\n]+$/", '', $this->sections['FILEEOF']);
            unset($this->sections['FILEEOF']);
        }

        foreach (['FILE', 'EXPECT', 'EXPECTF', 'EXPECTREGEX'] as $prefix) {
            // For grepping: FILE_EXTERNAL, EXPECT_EXTERNAL, EXPECTF_EXTERNAL, EXPECTREGEX_EXTERNAL
            $key = $prefix . '_EXTERNAL';

            if ($this->hasSection($key)) {
                // don't allow tests to retrieve files from anywhere but this subdirectory
                $dir = dirname($this->fileName);
                $fileName = $dir . '/' . trim(str_replace('..', '', $this->getSection($key)));

                if (file_exists($fileName)) {
                    $this->sections[$prefix] = file_get_contents($fileName);
                } else {
                    throw new BorkageException("could not load --" . $key . "-- " . $dir . '/' . trim($fileName));
                }
            }
        }

        if (($this->hasSection('EXPECT') + $this->hasSection('EXPECTF') + $this->hasSection('EXPECTREGEX')) != 1) {
            throw new BorkageException("missing section --EXPECT--, --EXPECTF-- or --EXPECTREGEX--");
        }

        if ($this->hasSection('PHPDBG') && !$this->hasSection('STDIN')) {
            $this->sections['STDIN'] = $this->sections['PHPDBG'] . "\n";
        }
    }
}