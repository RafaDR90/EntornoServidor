<?php
require_once 'FuncionesFicherosTXT.php';
$fichero=LeerTxt("datos.txt",5,"Index.php");
$linea=devuelveUltimaFoto($fichero);
echo "<img src='Img/$linea' alt='Ultima imagen subida'>";


function devuelveUltimaFoto($contenidoTxt):string{
    $todasLineas=explode("%", $contenidoTxt);
    $ultima = explode(';', $todasLineas[count($todasLineas) - 2]);
    return $ultima[8];
}