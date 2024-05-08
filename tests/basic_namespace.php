<?php

/*
    #define ZEND_CLONE_FUNC_NAME		"__clone"
    #define ZEND_CONSTRUCTOR_FUNC_NAME	"__construct"
    #define ZEND_DESTRUCTOR_FUNC_NAME	"__destruct"
    #define ZEND_GET_FUNC_NAME          "__get"
    #define ZEND_SET_FUNC_NAME          "__set"
    #define ZEND_UNSET_FUNC_NAME        "__unset"
    #define ZEND_ISSET_FUNC_NAME        "__isset"
    #define ZEND_CALL_FUNC_NAME         "__call"
    #define ZEND_CALLSTATIC_FUNC_NAME   "__callstatic"
    #define ZEND_TOSTRING_FUNC_NAME     "__tostring"
    #define ZEND_INVOKE_FUNC_NAME       "__invoke"
    #define ZEND_DEBUGINFO_FUNC_NAME    "__debuginfo"
*/

namespace myNamespace;

Class Basic_ns_class {
    public function __construct(){
        echo "test_class constructor";
    }
    public function __destruct(){
        echo "test_class destructor";
    }
    public function __call($name, $arguments){
        echo "test_class call $name";
    }
    public static function __callStatic($name, $arguments){
        echo "test_class callStatic $name";
    }
    public function __get($name){
        echo "test_class get $name";
    }
    public function __set($name, $value){
        echo "test_class set $name";
    }
    public function __isset($name){
        echo "test_class isset $name";
    }
    public function __unset($name){
        echo "test_class unset $name";
    }
    public function __toString(){
        echo "test_class toString";
    }
    public function __invoke(){
        echo "test_class invoke";
    }
    public function __debugInfo(){
        echo "test_class debugInfo";
    }
    public function __clone(){
        echo "test_class clone";
    }
}

namespace myNamespace\testNamespace;

class Basic_sub_ns_class {
    public function __construct(){
        echo "test_class constructor";
    }
}