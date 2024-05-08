<?php

$a = "Hola";

if(isset($a)){
    echo "Variable a is set\n";
}
if(isset($b)){
    echo "Variable b is set\n";
}
if(!isset($a,$b)){
    echo "Variables a or b not set\n";
}