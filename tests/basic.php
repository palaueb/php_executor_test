<?php

//die(getcwd());

echo "DIR BASIC: " . __DIR__ . PHP_EOL;

require_once('included.php');
//require('/home/hosting.com/web/included.php');
include('included.php');
include_once('included.php');

include_once __DIR__ . '/basic_operators.php';
include_once __DIR__ . '/basic_functions.php';
include getcwd() . '/basic_structures.php';
//require_once './basic_namespace.php';
require './basic_class.php';

