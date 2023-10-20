<?php
function mi_funcion_de_llamada_de_retorno(){
    return 'hola mundo!';
}

class MiClase{
    static function miMetodoDeLlamadaDeRetorno(){
        return 'HOLA MUNDO!';
    }
}

echo call_user_func('mi_funcion_de_llamada_de_retorno');
echo "<br>";
echo call_user_func(array('MiClase','miMetodoDeLlamadaDeRetorno'));