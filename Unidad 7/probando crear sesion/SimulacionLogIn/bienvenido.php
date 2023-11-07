<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php if(!isset($_SESSION['user'])|| (!isset($_SESSION['pw']))): ?>
<h1>Bienvenido a la pagina principal</h1>
<a href="formulario.php">Logueate</a>
<?php elseif(isset($_SESSION['user']) && (isset($_SESSION['pw']))): ?>
    <h1>Bienvenido <?php echo $_SESSION['user'] ?></h1>
    <a href="cerrarSesio.php">Cerrar Sesion</a>
<?php endif; ?>
</body>
</html>