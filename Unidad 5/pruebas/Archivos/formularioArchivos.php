<?php
if(is_uploaded_file($_FILES["foto"]["tmp_name"])) {
    $nombreDirectorio = "img/";
    $nombreArchivo = $_FILES["foto"]["name"];

    $nombreCompleto = $nombreDirectorio . $nombreArchivo;

    if(is_dir("img2")){
        mkdir("img2",0777);
    }

    if (is_file($nombreCompleto)) {
        $idUnico = time();
        $nombreArchivo = $idUnico . "-" . $nombreArchivo;
}
    $res = move_uploaded_file($_FILES["foto"]["tmp_name"], $nombreDirectorio . $nombreArchivo);
    if ($res) {
        echo "<br><h1>Imagen subida correctamente</h1>";
    } else {
        echo "<br>Error";
    }
}else{
    print ("No se ha podido subir el fichero");
}
