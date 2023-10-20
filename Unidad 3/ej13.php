<?php
$cadena="Hola, mundo. ¿Qué tál estas hoy?";
$primeros12=fn()=>"Los 12 primeros caracteres son: ".substr($cadena,0,12)."<br>";
$longitud=function () use ($cadena){
    return "La longitud de la cadena es: ".strlen($cadena)."<br>";
};
$mMayus=function () use ($cadena){
    return "Buscamos la posicion en la que aparece Mundo con M mayuscula: ".strpos($cadena,"Mundo")."<br>";
};
$mMinus=function () use ($cadena){
    return "Buscamos la posicion en la que aparece Mundo con m minuscula: ".strpos($cadena,"mundo")."<br>";
};
$convertMayus=fn()=>"Convertimos a mayuscula: ".strtoupper($cadena)."<br>";
$convertMayusUTF8=fn()=>"Convertimos a mayuscula con UTF8: ".mb_strtoupper($cadena,"UTF-8")."<br>";
$convertMinus=fn()=>"Todo en minusculas: ".mb_strtolower($cadena,"UTF-8")."<br>";
$devuelveAPartirDePunto=fn()=>"Devuelve a partir del . (punto incluido): ".strstr($cadena,".")."<br>";
$cadenaAlReves=fn()=>"Cadena al reves: ".strrev($cadena)."<br>";

echo $cadena."<br>";
echo $primeros12();
echo $longitud();
echo $mMayus();
echo $mMinus();
echo $convertMayus();
echo $convertMayusUTF8();
echo $convertMinus();
echo $devuelveAPartirDePunto();
echo $cadenaAlReves();