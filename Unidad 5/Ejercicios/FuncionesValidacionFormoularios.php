<?php
function sanidarStringFiltro($valor){

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
 * si $texto esta vacio dara false, si esta leno dara true
 * @param $texto
 * @return bool
 */
function validar_requerido($texto):bool{
    return !(trim($texto)=='');
}

/**
 * Comprueba que solo contiene letras minusculas/mayusculas, ascetnos y espacios
 * @param $texto
 * @return bool
 */
function son_letras($texto):bool{
    $patron="/^[a-zA-Záéíóú\s]+$/";
    return preg_match($patron,$texto);
}

function emailValido($correo) {
    //Filtra el correo electrónico para eliminar caracteres no deseados
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

    //Comprueba si el correo electrónico es valido
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true; //correo electrónico valido
    } else {
        return false; //correo electrónico no valido
    }
}

function telefonoValido($numero) {
    //Elimina espacios en blanco, guiones y paréntesis
    $numero = preg_replace("/\s|-|\(|\)/", "", $numero);

    //Comprueba si el número tiene el formato adecuado
    if (preg_match("/^[0-9]{9}$/", $numero)) {
        return true; //numero de teléfono valido
    } else {
        return false; //numero de teléfono no valido
    }
}

function sanearYValidarURL($url) {
    // Sanear la URL
    $url = filter_var($url, FILTER_SANITIZE_URL);

    // Validar la URL
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return $url; // La URL es válida después de la sanitización
    } else {
        return false; // La URL no es válida
    }
}

/*                    EJEMPLOS    EJEMPLOS    EJEMPLOS    EJEMPLOS
   $errores=[];

    if (!validar_requerido($nombre)){
        $errores["nombre"]="El nombre es obligatorio";
    }

    if(!son_letras($nombre)){
        $errores["nombre"]="El nombre solo puede estar compuesto por letras y espacios";
    }

    if (!filter_var($edad,FILTER_VALIDATE_INT)){
        $errores["edad"]="La edad debe estar compuesta por numeros enteros";
    }

    if(!filter_var($web,FILTER_VALIDATE_URL)){
        $errores["web"]="El campo web no es correcto";
    }
 * */