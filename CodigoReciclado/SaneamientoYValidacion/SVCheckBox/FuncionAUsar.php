<?php
/**
 * PUEDE ESTAR VACIO
 * Sanea y valida <checkbox>, en caso de error añade error a array de errores.
 * @param $nameCheckBox string con el name del checkbox
 * @param $arrayValoresValidos array con los valores permitidos
 * @param $errores array de errores
 * @return mixed
 */
function ComprueboCheckBoxOptativo($nameCheckBox, $arrayValoresValidos, &$errores):mixed{
    if (!isset($_POST[$nameCheckBox])) {
        return "";
    }
    $valores=$_POST[$nameCheckBox];
    if(!validarTipoCheckBox($valores,$arrayValoresValidos)){
        $errores[$nameCheckBox]="El valor no es valido";
        return null;
    }
    return $valores;
}

/**
 * NO PUEDE ESTAR VACIO
 * Sanea y valida <checkbox>, en caso de error añade error a array de errores.
 * @param $nameCheckBox string con el name del checkbox
 * @param $arrayValoresValidos array con los valores permitidos
 * @param $errores array de errores
 * @return mixed
 */
function ComprueboCheckBoxObligatorio($nameCheckBox, $arrayValoresValidos, &$errores):mixed{
    if (!isset($_POST[$nameCheckBox])) {
        $errores[$nameCheckBox] = "El campo es obligatorio";
        return null;
    }
    $valores=$_POST[$nameCheckBox];
    if(!validarTipoCheckBox($valores,$arrayValoresValidos)){
        $errores[$nameCheckBox]="El valor no es valido";
        return null;
    }
    return $valores;


}