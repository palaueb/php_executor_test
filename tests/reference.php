<?php
Class A{
    public function __construct(){
    }
}

$a = [];
$a['test'] = 'value';

$b = 'value';

function &gv($_a){
    global $a;
    return $a[$_a];
}
function execute_function($func, $arguments) {
    if(!is_array($arguments)){
        $var = &gv($arguments);
        $input = [$var];
    }else{
        $input = [];
        foreach($arguments as $variable){
            $input[] = &gv($variable);
        }
    }
    
    return call_user_func_array($func, $input);
}
$arguments = 'test';
$result = execute_function('strtoupper',$arguments);
var_export($result);


$clase = new A();
$a['clase'] = $clase;
$arguments = 'clase';
$result = execute_function('get_class',$arguments);
var_export($result);


$a['value1'] = 'HOLA QUE HACE';
$a['value2'] = 3;
$a['value3'] = 3;

// substr(string $string, int $offset, ?int $length = null): string
$arguments = ['value1', 'value2'];
$result = execute_function('substr',$arguments);
var_export($result);

$arguments = ['value1', 'value2', 'value3'];
$result = execute_function('substr',$arguments);
var_export($result);