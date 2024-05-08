<?php

function doloop(){
    echo "Do loop: ";
    for($i=0;$i<3;$i++){
        echo $i." . ";
    }
    echo PHP_EOL;
}

class A{
    public static function create(){
        echo "A create: ".PHP_EOL;
        for($i=0;$i<3;$i++){
            doloop();
        }
    }
}

for($j=0;$j<3;$j++){
    echo "for j".PHP_EOL;
    for($i=0;$i<3;$i++){
        echo "for i".PHP_EOL;
        A::create();
        break 2;
    }
}