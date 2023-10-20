<?php
$multiplicador = function ($a,$b){
    return $a*$b;
};

$arrayNum1=range(1,9);
$arrayNum2=range(1,10);

$resultado=array_map($multiplicador,$arrayNum1,$arrayNum2);
echo implode(" - ",$resultado);