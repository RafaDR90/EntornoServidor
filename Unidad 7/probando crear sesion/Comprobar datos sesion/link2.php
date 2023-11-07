<?php
session_name("SesionConNombre");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h4>Idetificador de sesion</h4>
<p><?php echo session_id() ?></p>

<h4>Fichero que almacena los datos</h4>
<p><?php echo session_save_path() ?></p>

<h4>Nombre de la cookie de sesion</h4>
<p><?php echo session_name() ?></p>
<?php session_destroy(); ?>
<a href="index.php">Volver</a>
</body>
</html>