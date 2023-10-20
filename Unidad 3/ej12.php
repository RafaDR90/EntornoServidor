<?php
$cadena="Hola";
$duplicar=function() use ($cadena){
    $cadenaDuplicada="";
    for ($i=0;$i<strlen($cadena);$i++){
        $cadenaDuplicada.=$cadena[$i].$cadena[$i];
    }
    return $cadenaDuplicada;
};

echo $cadenaAMostrar=$duplicar();