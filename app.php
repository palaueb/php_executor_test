<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpExecutor\PhpExecutor;

$cdmon_setup = [
    'php_ini' => [],
    'path_replace' => ['/Users/marc/Documents/feina/hack/php_executor_test' => '/home/hosting.com/web'],
    // the path to the script can be wherever you want, it will take the filename and normalize it with __DIR__
    // in this case will be /Users/marc/Documents/feina/hack/php_executor_test/tests/basic.php
    
    //'init_script' => '/Volumes/dot.neo/github.cdmon.com/repos/cdmon-transversal/core/_secret/Classes/Dades/MySql/class_MySql.php',
    'init_script' => 'tests/basic.php',
];

// a nivells pràctics necessito ser capaç de substituir el path d'execusió falsejant el path de l'arrel mitjançant path_replace

$executor = new PhpExecutor();
//$executor->debug=false;
$executor->setup_execution($cdmon_setup);
//$executor->set_custom_constants(['PHP_EOL' => "*"]);
$executor->init_execution();

