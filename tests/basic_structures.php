<?php

switch(null){
    case 1: echo "1\n";
    case 2: echo "2\n"; 
    break;
    default: echo "default\n"; break;
}
$a = 100;
switch($a){
    case 100: echo "is 100"; break;
    case 2: echo "2"; break;
    default: echo "default"; break;
}
die();
function level1(){}

function level1_2():bool{ return true;}

function level2():string{
    echo "level2".PHP_EOL;
    return "string";
}
function level3($arg1):string{
    var_export($arg1);
    return "HELLO $arg1";
}
function level4(...$arguments):string{
    var_export($arguments);
    $count = count($arguments);
    return "there are $count arguments";
}
function level5(){
    $args = func_get_args();
    var_export($args);
}

$a = [];
$a[] = "A";

/*
die("END_EXECUTOR");


echo "LOOP WITH ONLY A true CONDITION AND BREAK:".PHP_EOL;

for(;;){
    for(;;){
        for(;;){
            echo "Stop the parent for".PHP_EOL;
            break 2;
        }
    }
    for(;;){
        for(;;){
            echo "Stop the main for".PHP_EOL;
            break 3;
        }
    }
}
//"END_EXECUTOR";


for($c=0,$i=0;true,$c++,true,$i<10;$i++){
    echo "ITER $i".PHP_EOL;
}
echo  "REGULAR LOOOP:".PHP_EOL;

for($i=0;$i<10;$i++){
    echo $i." . ";
}
echo PHP_EOL;

echo "LOOP WITH TWO CONDITIONS:".PHP_EOL;
for($i=0, $c=10;$i<10, $i<20;$i++, $c+=2){
    echo $i." . ";
}
echo PHP_EOL;


$i=0;
while($i<10){
    echo $i." . ";
    $i++;
}

*/


if(false){ echo 'false'; }
elseif(!true){ echo 'not true'; }
else{ echo 'final else'; }
echo "EOF".PHP_EOL;