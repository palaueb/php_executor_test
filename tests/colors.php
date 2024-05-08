<?php
// Definir colores ANSI
$color_rojo = "\033[31m";
$color_verde = "\033[32m";
$color_azul = "\033[34m";
$color_reset = "\033[0m"; // Restablecer el color a su valor predeterminado

// Texto a imprimir con colores
$texto_rojo = "Texto en rojo";
$texto_verde = "Texto en verde";
$texto_azul = "Texto en azul";

// Imprimir texto con colores
echo $color_rojo . $texto_rojo . $color_reset . "\n";
echo $color_verde . $texto_verde . $color_reset . "\n";
echo $color_azul . $texto_azul . $color_reset . "\n";