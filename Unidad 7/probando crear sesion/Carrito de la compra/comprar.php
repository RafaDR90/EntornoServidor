<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (!isset($_SESSION['productos'])){
        $_SESSION['productos'] = array();
    }

    if (isset($_POST['submit'])) {
        if ($_POST['submit'] === 'Añadir a la cesta') {
            $nombreProducto = $_POST['nombre_producto'];
            $cantidad = $_POST['cantidad'];

            if (isset($_SESSION['productos'][$nombreProducto])){
                $_SESSION['productos'][$nombreProducto] += $cantidad;
            } else {
                $_SESSION['productos'][$nombreProducto] = $cantidad;
            }
        } elseif ($_POST['submit'] === 'Comprar') {
            header("Location: otra_pagina.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Compra</title>
</head>
<body>
<form action="#" method="post">
    <label for="nombre_producto">Nombre del producto:</label>
    <input type="text" id="nombre_producto" name="nombre_producto" required><br>

    <label for="cantidad">Cantidad (1-5):</label>
    <input type="number" id="cantidad" name="cantidad" min="1" max="5" required><br>

    <input type="submit" name="submit" value="Añadir a la cesta">
    <input type="submit" name="submit" value="Comprar">
</form>
<?php
    if (isset($_SESSION['productos'])):
    foreach ($_SESSION['productos'] as $producto=>$valor):
?>
<p><?php echo "$producto : cantidad: $valor" ?></p>
<?php endforeach;
endif;
?>
</body>
</html>
