<?php

// show all errors
error_reporting(E_ALL);

include('test.php');
require_once __DIR__ . '/vendor/autoload.php';

use PhpExecutor\PhpExecutor;

//$main_path = "/Volumes/dot.neo/source/php-src/tests/";
$main_path = "/Users/marc/Documents/feina/hack/php-src/tests/";
$test_to_pass = [
    "basic/001.phpt",
    //"basic/002.phpt", //array!
    "basic/006.phpt",
    "basic/007.phpt",
    "basic/008.phpt",
    "basic/009.phpt",
    "basic/010.phpt",
    //"basic/011.phpt", // cli arguments
    //"basic/012.phpt", // $_SERVER
    "lang/001.phpt",
    //"tests/lang/002.phpt", // while
    "lang/003.phpt", //switch
    "lang/004.phpt", //if else
    "lang/005.phpt", //if elseif else
    "lang/006.phpt", //if elseif else nested
    //"lang/007.phpt", // global and static variables
    //"lang/008.phpt", // recursive function
    //"lang/009.phpt", // function with params
    //"lang/010.phpt", // function with params and return
    "lang/015.phpt",
    "strings/001.phpt",
    "strings/002.phpt", //printf

];

//$path = $argv[1]



function execute_test($test_path) {
    $test = new TestFile($test_path, false);

    //$sections = $test->getAllSections();
    //create file if not exists
    $test_dir_path = "./php_tests/";
    $test_file_path = $test_dir_path . sha1($test_path) . '.php';
    if(!file_exists($test_file_path)) {
        $test_file = fopen($test_file_path, "w");
        fwrite($test_file, $test->getSection('FILE'));
        fclose($test_file);
    }

    echo trim($test->getSection('TEST')) . " >> ".trim($test_path);

    //execute it
    $test_setup = [
        'debug' => 5,
        'php_ini' => [],
        'return_output' => true,
        //'path_replace' => ['/Users/marc/Documents/feina/hack/php_executor_test' => '/home/hosting.com/web'],
        // the path to the script can be wherever you want, it will take the filename and normalize it with __DIR__
        // in this case will be /Users/marc/Documents/feina/hack/php_executor_test/tests/basic.php
        
        //'init_script' => '/Volumes/dot.neo/github.cdmon.com/repos/cdmon-transversal/core/_secret/Classes/Dades/MySql/class_MySql.php',
        'init_script' => $test_file_path,
    ];
    
    // a nivells pràctics necessito ser capaç de substituir el path d'execusió falsejant el path de l'arrel mitjançant path_replace
    $executor = new PhpExecutor();
    //$executor->debug=false;
    $executor->setup_execution($test_setup);

    //$executor->set_custom_constants(['PHP_EOL' => "*"]);
    $output = trim($executor->init_execution());

    echo "\r\033[K";
    $expect = trim($test->getSection('EXPECT'));
    //echo "[$output][$expect]";
    if($output == $expect) {
        echo "\033[32m [TEST PASSED] ";
    } else {
        echo "EXPECT: ".PHP_EOL;
        var_export($expect);
        echo PHP_EOL;
        echo "OUTPUT: ".PHP_EOL;
        var_export($output);
        echo "\033[31m [TEST FAILED] ";
    }
    echo $test->getSection('TEST') . "\033[0m";
}

foreach ($test_to_pass as $test) {
    execute_test($main_path . $test);
}