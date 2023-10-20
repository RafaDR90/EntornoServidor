<?php
function esCadena ($arg){
    if(is_string($arg)){
        if(empty($arg)){
            return "Este es el relleno porque estaba vacia";
        }else{
            return strtoupper($arg);
        }
    }else{
        return $arg." no es una cadena de caracteres";
    }
}
echo esCadena(3);