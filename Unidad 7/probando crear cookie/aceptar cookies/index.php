<?php
    if ($_GET[''])
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
            if(!isset($_COOKIE['cookies'])):
        ?>
        <form method="post" action="#">
            <label for="aceptar">Esta pagina tiene cookies</label><br>
            <input type="submit" id="aceptar" value="true">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>