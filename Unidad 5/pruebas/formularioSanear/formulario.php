<?php include "sanearYValidaFormulario.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Formulario de Datos Personales</h1>
<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" <?php if(isset($_POST["nombre"]))echo "placeholder=".$_POST["nombre"] ?> required>
    <?php if(isset($errores["nombre"])): ?>
    <span><?=$errores["nombre"];?></span>
    <?php endif; ?>
    <br>

    <label for="edad">Edad:</label>
    <input type="text" id="edad" name="edad" <?php if(isset($_POST["edad"]))echo "placeholder=".$_POST["edad"] ?>>
    <?php if(isset($errores["edad"])): ?>
    <span><?=$errores["edad"];?></span>
    <?php endif; ?>
    <br>

    <label for="web">Página web:</label>
    <input type="text" id="web" name="web" <?php if(isset($_POST["web"]))echo "placeholder=".$_POST["web"] ?>>
    <?php if(isset($errores["web"])): ?>
    <span><?=$errores["web"];?></span>
    <?php endif; ?>
    <br>

    <label for="correo">Correo electrónico:</label>
    <input type="text" id="correo" name="correo" <?php if(isset($_POST["correo"]))echo "placeholder=".$_POST["correo"] ?>>
    <?php if(isset($errores["correo"])): ?>
    <span><?=$errores["correo"];?></span>
    <?php endif; ?>
    <br>


    <input type="submit" value="Enviar">
</form>
</body>
</html>