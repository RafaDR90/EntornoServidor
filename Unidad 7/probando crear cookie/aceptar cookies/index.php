<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aceptar'])) {
    if ($_POST['aceptar'] === 'si') {
        setcookie("cookies", 'aceptado');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Bienvenido</h1>
<div>
    <?php
    if (!isset($_COOKIE['cookies'])):
        ?>
        <form method="post" action="#">
            <label for="aceptar">¿Acepta el uso de cookies en esta página?</label><br>
            <select name="aceptar" id="aceptar">
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>
            <br>
            <input type="submit" value="Aceptar">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
