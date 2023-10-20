<?php
$numero1=10;
$multiplicadorPorTres = function (int $numero){
    return $numero*3;
};
echo "el resultado de multiplicar $numero1 por 3 es ".$multiplicadorPorTres($numero1);