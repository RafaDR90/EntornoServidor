<?php
include_once "V_IMG.php";

/**
 * Funcon que sube la foto a una ruta especificada, Puedo cambiar el nombre de la foto
 * añadiendo campos en la variable $rutaCompleta despues del punto.
 * La ruta completa debe terminar en / ejemplo: img/ o ./
 * @param $nameImagen string con el input name=""
 * @param $rutaImagen string con la ruta donde se guardara la imagen
 * @return void
 */
function guardaImagen($nameImagen, $rutaImagen){
    $imagen = $_FILES[$nameImagen];
    $rutaCompleta = $rutaImagen . $imagen["name"];
    if(!file_exists($rutaImagen)) {
        mkdir($rutaImagen, 0777, true);
    }
    move_uploaded_file($imagen["tmp_name"], $rutaCompleta);
}