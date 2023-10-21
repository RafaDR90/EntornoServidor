<?php
/**
 * Funcion que sanea y valida un nombre, en caso de error retorna un string con el error.
 * @param $numero
 * @return bool
 */
function telefonoValido($numero) {
    //Elimina espacios en blanco, guiones y paréntesis
    $numero = preg_replace("/\s|-|\(|\)/", "", $numero);

    //Comprueba si el número tiene el formato adecuado
    if (preg_match("/^[0-9]{9}$/", $numero)) {
        return true; //numero de teléfono valido
    }
        return false; //numero de teléfono no valido

}

