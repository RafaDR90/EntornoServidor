<?php
/**
 * Funcion que valida una imagen, en caso de error retorna un string con el error, sino retorna imagen.
 * *COMPROBAR PARAMETROS REQUERIDOS*
 * @param $nameImagen string con el nombre de la imagen
 * @param $errores array de errores
 * @return string|array
 */
function compruebaImagen($nameImagen, &$errores):string|null{
    $imagen = $_FILES[$nameImagen];

    if ($imagen["error"] !== 0) {
        return $errores[$nameImagen]="Error al subir el archivo.";
    }

    $tiposPermitidos = ["image/jpeg", "image/png", "image/gif"];
    if (!in_array($imagen["type"], $tiposPermitidos)) {
        return $errores[$nameImagen]="Tipo de archivo no valido. Solo se permiten imagenes (JPEG, PNG, GIF).";
    }

    $tamanoMaximo = 100 * 1024;
    if ($imagen["size"] > $tamanoMaximo) {
        return $errores[$nameImagen]="El tamaño del archivo es mayor de 100 KB.";
    }
    return null;
}