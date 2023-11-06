<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['user'] ?></h1>
</body>
</html>