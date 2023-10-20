<?php
function leerTxt($nombreFichero,$tiempoRedireccion,$archivoARedireccionar){
    if (file_exists($nombreFichero)) {
        return file_get_contents($nombreFichero);

    }
    header("refresh:$tiempoRedireccion;url=$archivoARedireccionar");
}




