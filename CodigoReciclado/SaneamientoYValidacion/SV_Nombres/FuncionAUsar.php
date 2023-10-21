<?php
include "FuncionesFicherosTXT.php";


/**
 * Funcion que sanea y valida un nombre, en caso de error retorna un string con el error.
 * @param $nombreAValidar string con el nombre a validar
 * @param $nombreValidado string que retorna validado la funcion
 * @param $errores array de errores
 * @param $nombreError
 * @return string|null
 */
function saneaYValidaNombresPOST( $nombreAValidar, &$nombreValidado, array &$errores, $nombreError):string|null{
    if(isset($_POST[$nombreAValidar])){
        $nombreValidado=$_POST[$nombreAValidar];

        $nombreValidado=sanidarStringFiltro($nombreValidado);

        if (!noEstaVacio($nombreValidado)) {
            $errores[$nombreError] = "El campo no puede estar vacio";
            return null;
        }
        if(!son_letras($nombreValidado)){
            $errores[$nombreError]="El campo solo puede estar compuesto por letras y espacios";
            return null;
        }
        return $nombreValidado;
    }
    $errores[$nombreError]="El campo no puede estar vacio";
    return null;
}


/**
 * Funcion que sanea y valida un nombre, en caso de error retorna un string con el error.
 * @param $nombreAValidar string con el nombre a validar
 * @param $nombreValidado string que retorna validado la funcion
 * @param $errores array de errores
 * @param $nombreError
 * @return string|null
 */
function saneaYValidaNombresGET( $nombreAValidar, &$nombreValidado, array &$errores, $nombreError):string|null{
    if(isset($_GET[$nombreAValidar])){
        $nombreValidado=$_GET[$nombreAValidar];

        $nombreValidado=sanidarStringFiltro($nombreValidado);

        if (!noEstaVacio($nombreValidado)) {
            return null;
            $errores[$nombreError] = "El campo no puede estar vacio";
        }
        if(!son_letras($nombreValidado)){
            return null;
            $errores[$nombreError]="El campo solo puede estar compuesto por letras y espacios";
        }
        return $nombreValidado;
    }
    return $errores[$nombreError]="El campo no puede estar vacio";
}