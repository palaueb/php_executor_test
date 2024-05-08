<?php

echo "DIR INCLUDED: " . __DIR__ . PHP_EOL;

class test {
    function __construct(){
        echo "CLASS TEST DIR: " . __DIR__ . PHP_EOL;
    }
    public static function test(){
        echo "CLASS TEST DIR: " . __DIR__ . PHP_EOL;
    }
    
}

function call_up(){
    echo "CALL UP DIR: " . __DIR__ . PHP_EOL;
}

include_once __DIR__ . '/subdir/subdir.php';