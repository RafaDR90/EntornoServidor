<?php
$alumnos=["Marta"=>7.8,"Luis"=>5,"Lorena"=>6.9];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["nombre"]) && isset($_POST["nota"])) {
    $nombre=$_POST["nombre"];
    $nota=intval($_POST["nota"]);

    if(!array_key_exists($nombre,$alumnos)){
        array_push($alumnos,array($nombre,$nota));
    }
sort($alumnos);
}

