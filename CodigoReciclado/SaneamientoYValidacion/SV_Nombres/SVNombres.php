<?php

/**
 * Funcion que sanea un string, retirando etiquetas,limpiando string por ambas partes,
 * corrige entidades html como por ejemplo quot y las convierte a sus respectivos
 * caracteres
 * @param $valor string a sanear
 * @return string string saneado
 */
function sanidarStringFiltro($valor):string{

    //Retira etiquetas html y php
    $valor=strip_tags($valor);

    //limpia el string por delante y x detras
    $valor=htmlspecialchars($valor,ENT_QUOTES);

    //corige entidades html y las cambia
    $valor=str_replace(["quot;","&#039;"],["&#34;","&#39;"],$valor);

    //convierte las entidades como "quot;" en sus respectivos caracteres
    return html_entity_decode($valor);
}

/**
 * si $texto esta vacio retornara false, de lo contrario retornara true
 * @param $texto string a comprobar
 * @return bool true si no esta vacio, false si esta vacio
 */
function noEstaVacio($texto):bool{
    return !(trim($texto)=='');
}

/**
 * Comprueba que solo contiene letras minusculas/mayusculas, ascetnos y espacios
 * (\s acepta espacios)
 * @param $texto string a comprobar
 * @return bool true si solo contiene letras, false si no
 */
function son_letras($texto):bool{
    $patron="/^[a-zA-Záéíóú\s]+$/";
    return preg_match($patron,$texto);
}