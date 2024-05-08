<?php

// Cadena de ejemplo
$string = "PhpParser\Node\Stmt\Function";

// Usando strrpos() y substr()
$start = microtime(true);
for ($i = 0; $i < 10000000; $i++) {
    $lastBackslashPos = strrpos($string, '\\');
    $namespace = substr($string, 0, $lastBackslashPos);
    $className = substr($string, $lastBackslashPos + 1);
}
$end = microtime(true);
echo "Tiempo con strrpos y substr: " . ($end - $start) . " segundos\n";

// Usando expresiones regulares
$start = microtime(true);
for ($i = 0; $i < 10000000; $i++) {
    preg_match('/^(.*)\\\\([^\\\\]+)$/', $string, $matches);
    $namespace = $matches[1];
    $className = $matches[2];
}
$end = microtime(true);
echo "Tiempo con expresiones regulares: " . ($end - $start) . " segundos\n";
?>
