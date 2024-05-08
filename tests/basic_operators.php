<?php


//means variable with name a equals "X"
$a="X";
//means variable with name b equals "Y"
$b="Y";
//means variable with name Y equals 'a'
$Y='a';
//means variable with name c equals the inner value of variable with name b
$c=$b;
//means variable with name d equals the inner inner inner value of variable with name c, which is a, that is X
$d = $$$c;
//means variable with name [$a[$Y[$b]]] equals 2, $X=2
$$$c=2;

echo $Y . ":" . $b . PHP_EOL . $d . $d . $d;



$n1=10;
$n2=20;
$n3=$n1 + $n2;
$n4=$n3 - $n2;
$n5=$n4 * $n2;
$n6=$n5 / $n2;

$x = 0;


// %token END 0 "end of file"
// %token T_ATTRIBUTE    "'#['"
// %token T_PLUS_EQUAL   "'+='"
$x+=10;
// %token T_MINUS_EQUAL  "'-='"
$x-=2;
// %token T_MUL_EQUAL    "'*='"
$x*=2;
// %token T_DIV_EQUAL    "'/='"
$x/=2;
// %token T_CONCAT_EQUAL "'.='"
echo "$a + $b = $a$b".PHP_EOL;
$a.=$b;
echo $a.PHP_EOL;
// %token T_MOD_EQUAL    "'%='"
$x=999;
$x%=2;
// %token T_AND_EQUAL    "'&='"
$x=7;
$x&=2;
// %token T_OR_EQUAL     "'|='"
$x=7;
$x|=2;
// %token T_XOR_EQUAL    "'^='"
$x=7;
$x^=2;
// %token T_SL_EQUAL     "'<<='"
$x=7;
$x<<=2;
// %token T_SR_EQUAL     "'>>='"
$x=7;
$x>>=2;
// %token T_COALESCE_EQUAL "'??='"
$happy_null ??= "I am happy";
$not_happy_null = "I am another thing";
$not_happy_null ??= "What is happyning?";
echo $not_happy_null.PHP_EOL;
echo "A","B","C",PHP_EOL;

$arr = [1,2,3,4,5,6,7,8,9,10];
$sub_arr = [
    ["a", "b", "c"],
    "middle" => ["d", "e", "f"],
    ["g", 
        "super" => ["h", "i", "j"],
    "k"],
    ["l", "m", "n"],
    ["j", "k", "l"],
    ["m", "n", "o"]
];

// %token T_BOOLEAN_OR   "'||'"
if(true || false) echo "true || false".PHP_EOL;
// %token T_BOOLEAN_AND  "'&&'"
if(true && false) echo "true && false".PHP_EOL;
// %token T_IS_EQUAL     "'=='"
if(1 == 1) echo "1 == 1".PHP_EOL;
// %token T_IS_NOT_EQUAL "'!='"
if(1 != 2) echo "1 != 2".PHP_EOL;
// %token T_IS_IDENTICAL "'==='"
if(1 === 1) echo "1 === 1".PHP_EOL;
// %token T_IS_NOT_IDENTICAL "'!=='"
if(1 !== 2) echo "1 !== 2".PHP_EOL;
// %token T_IS_SMALLER_OR_EQUAL "'<='"
if(1 <= 2) echo "1 <= 2".PHP_EOL;
// %token T_IS_GREATER_OR_EQUAL "'>='"
if(2 >= 1) echo "2 >= 1".PHP_EOL;
// %token T_SPACESHIP "'<=>'"
echo 1 <=> 1; // returns 0
echo 1 <=> 2; // returns -1
echo 2 <=> 1; // returns 1
// %token T_SL "'<<'"
$x=50;
$x = $x << 2;
// %token T_SR "'>>'"
$x = $x >> 2;
// %token T_INC "'++'"
$x++;
// %token T_DEC "'--'"
$x--;
// %token T_INT_CAST    "'(int)'"
(int) 3.14159;
// %token T_DOUBLE_CAST "'(double)'"
(double) "3.14159";
// %token T_STRING_CAST "'(string)'"
(string) 12345;
// %token T_ARRAY_CAST  "'(array)'"
(array) "12345";
// %token T_OBJECT_CAST "'(object)'"
//TODO object!
// %token T_BOOL_CAST   "'(bool)'"
(bool) 1;
// %token T_UNSET_CAST  "'(unset)'"
//DEPRECATED on PHP 7.2
//$var = 10;
//$var = (unset) $var;

// %token T_OBJECT_OPERATOR "'->'"
// %token T_NULLSAFE_OBJECT_OPERATOR "'?->'"
// %token T_DOUBLE_ARROW    "'=>'"
$double_arrow = [
    'a' => 'XXX',
    'b' => 'YYY',
    'c' => 'ZZZ'
];

// %token T_OPEN_TAG        "open tag"
// %token T_OPEN_TAG_WITH_ECHO "'<?='"
// %token T_CLOSE_TAG       "'?'.'>'"
// %token T_WHITESPACE      "whitespace"
// %token T_START_HEREDOC   "heredoc start"
// %token T_END_HEREDOC     "heredoc end"
// %token T_DOLLAR_OPEN_CURLY_BRACES "'${'"
// %token T_CURLY_OPEN      "'{$'"
// %token T_PAAMAYIM_NEKUDOTAYIM "'::'"
// %token T_NS_SEPARATOR    "'\\'"
// %token T_ELLIPSIS        "'...'"
// %token T_COALESCE        "'??'"
$val = null ?? 'is_null';
$val = 'is_not_null' ?? 'is_null';
// %token T_POW             "'**'"
$value = 2 ** 3;
// %token T_POW_EQUAL       "'**='"
$value = 4;
$value **= 2; 

; // noop


/*
TODO: more tests
$arr = get_defined_vars();
print_r($arr);

same as $a = 'XGLOBALX';
$GLOBALS['a'] = 'XGLOBALX';
*/