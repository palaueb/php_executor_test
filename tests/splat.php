<?php

$arr1 = [1, 2];
$arr2 = [3, 4];
$arr3 = [...$arr1, ...$arr2];

var_export($arr3);


function test_splat(...$arguments){
    echo "Arguments: ";
    print_r($arguments);
    echo PHP_EOL;
}

$tokens = PhpToken::tokenize(file_get_contents(__FILE__));

foreach ($tokens as $token) {
    echo "Line {$token->line}: {$token->getTokenName()} ('{$token->text}')", PHP_EOL;
}