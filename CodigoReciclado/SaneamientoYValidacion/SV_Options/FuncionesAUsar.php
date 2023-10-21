<?php
/**
 * PUEDE ESTAR VACIO
 * Sanea y valida <select>, en caso de error añade error a array de errores.
 * @param $nameOption string con el name del select
 * @param $arrayValoresValidos array con los valores permitidos
 * @param $errores array de errores
 * @return ?string
 */
function ComprueboOptionOptativo($nameOption, $arrayValoresValidos, &$errores):?string{
    if (!isset($_POST[$nameOption])){
        return "";
    }
    $valor=$_POST[$nameOption];
    if(!validarTipoCheckBox($valor,$arrayValoresValidos)){
        $errores[$nameOption]="El valor no es valido";
        return null;
    }
    return $valor;
}

/**
 * NO PUEDE ESTAR VACIO
 * Sanea y valida <select>, en caso de error añade error a array de errores.
 * @param $nameCheckBox string con el name del Option
 * @param $arrayValoresValidos array con los valores permitidos
 * @param $errores array de errores
 * @return ?string
 */
function ComprueboOptionObligatorio($nameOption, $arrayValoresValidos, &$errores):?string{
    if (!isset($_POST[$nameOption])){
        $errores[$nameOption]="El campo es obligatorio";
        return null;
    }
    $valor=$_POST[$nameOption];
    if(!validarTipoCheckBox($valor,$arrayValoresValidos)){
        $errores[$nameOption]="El valor no es valido";
        return null;
    }
return $valor;

}