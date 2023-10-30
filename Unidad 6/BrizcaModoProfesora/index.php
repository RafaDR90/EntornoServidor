<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
    require_once "AutoLoad.php";
    require_once "Config/config.php";
    use Controllers\frontController;

    frontController::main();
?>
<h1>Casino </h1>
<nav>
    <ul>
        <li><a href="http://localhost/Entorno%20Servidor/Unidad%206/BrizcaModoProfesora/index.php?controller=baraja&action=mostrarBaraja">Mostrar Cartas Baraja</a>
        </li>
    </ul>
</nav>
</body>
</html>
