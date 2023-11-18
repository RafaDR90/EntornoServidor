<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Bienvenido a su Agenda</h1>
<?php
require_once "AutoLoad.php";
require_once 'config/config.php';
use lib\BaseDatosNoExtend;

$db= new BaseDatosNoExtend();
?>
<h2>He conectado usando la lase BaseDatos con extend.</h2>
<?php
try{
    $db->consulta('SELECT * FROM contactos');


    while($fila=$db->extraer_registro()){
        foreach($fila as $campo => $valor){
            echo "$campo: $valor <br><br>";
        }
    }
}catch (PDOException $err){
    die("Error: ejecutando la base de datos");
}
?>
</body>
</html>