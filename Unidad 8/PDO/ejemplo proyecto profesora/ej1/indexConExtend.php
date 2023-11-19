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
use lib\BaseDatos_e_Np;

$db= new BaseDatos_e_Np()
?>
    <h2>He conectado usando la lase BaseDatos con extend.</h2>
<?php
try{
    $stmt=$db->query('SELECT * FROM contactos');
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<p>Nombre:".$row['nombre']."</p>";
    }
}catch (PDOException $err){
    die("Error: ejecutando la base de datos");
}
?>
</body>
</html>