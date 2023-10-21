<?php
/**
 * Valida si un valor seleccionado en un campo <checkbox> es valido.
 * @param $arrayValor string valor a comprobar
 * @param $arrayValoresValidos array con valores permitidos
 * @return bool
 */
function validarTipoCheckBox($valor, array $arrayValoresValidos):bool{
    $valorSaneado=sanidarStringFiltro($valor);
    if(!in_array($valorSaneado,$arrayValoresValidos)){
        return false;
    }
    return true;
}



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