# Test suite

/!\ If you try to execute your code, provably you will get frustrated.

This is a TOY project, the main objective is to be able to emulate the execution of a PHP project to be able to modify the behavior of the execution.

If you are searching for something serious, try xdebug for PHP. There are tons of serious projecs. Don't bother me with bugs or diregards about what is wrong, I DON'T CARE.

Enjoy.

## Installation

```
git clone git@github.com:palaueb/php_executor_test.git
composer install
```

## Execution
```
php app.php
```

## Output
```
Setup execution
Init execution
Get root path: tests/basic.php
Get PHP path: tests/basic.php
Prepare AST
Populate path: .../php_executor_test/tests/basic.php
Get in file: .../php_executor_test/tests/basic.php
Load AST
Execute AST in context [\]
String: [DIR BASIC: ]
```





