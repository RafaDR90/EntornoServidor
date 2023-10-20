<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"):?>
    <?php if(!empty($_POST["nombre"]) and !empty($_POST["apellido"])):?>
    <h1>Datos recibidos</h1>
    Nombre: <?=$_POST["nombre"]?>
    <br>
    Apellidos: <?=$_POST["apellido"]?>
    <?php else:?>
    <p>No Funciona!</p>
    <?php endif; ?>
<?php endif;?>
</body>
</html>