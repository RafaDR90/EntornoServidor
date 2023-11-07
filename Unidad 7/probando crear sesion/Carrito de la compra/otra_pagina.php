<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h4>Has comprado:</h4>
    <?php
    session_start();
    if (isset($_SESSION['productos'])):
        foreach ($_SESSION['productos'] as $producto=>$valor):
            ?>
            <p><?php echo "$producto : cantidad: $valor" ?></p>
        <?php endforeach;
    endif;
    session_destroy();
    header("Refresh: 5; url=index.php");
    ?>
<p>Se redirigira en 5 segundos.</p>
</body>
</html>
