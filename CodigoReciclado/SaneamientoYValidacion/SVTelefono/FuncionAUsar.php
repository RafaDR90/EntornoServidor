<?php
/**
 * NUMERO OBLIGATORIO
 * Sanea y valida un numero de telefono, en caso de error añade error a array de
 * errores y retorna null y en caso correcto retorna el numero.
 * @param $errores
 * @param $nameNumero
 * @return mixed
 */
function validaTelefonoObligatorioPOST(&$errores, $nameNumero):mixed{
    if (isset($_POST[$nameNumero])){
        $numero=$_POST[$nameNumero];
        if (!telefonoValido($numero)){
            $errores[$nameNumero]="El numero de telefono no es valido";
            return null;
        }
        return $numero;
    }else {
        $errores[$nameNumero]="El campo numero de telefono es obligatorio";
        return null;
    }
}

/**
 * NUMERO OPTATIVO
 * Sanea y valida un numero de telefono, en caso de error añade error a array de
 * errores y retorna null y en caso correcto retorna el numero.
 * @param $errores
 * @param $nameNumero
 * @return mixed
 */
function validaTelefonoOptativoPOST(&$errores, $nameNumero):mixed{
    if (isset($_POST[$nameNumero])){
        $numero=$_POST[$nameNumero];
        if (!telefonoValido($numero)){
            $errores[$nameNumero]="El numero de telefono no es valido";
        }
        return $numero;
    }
    return null;
}