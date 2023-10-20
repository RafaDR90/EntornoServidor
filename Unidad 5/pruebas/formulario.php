<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Formulario</h1>
    <form method="POST" action="NuevoAmigoPhp.php">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="apellito">Apellido</label>
        <input type="text" name="apellido">

        <input type="checkbox" name="aceptar terminos" required>
        <input type="submit" value="enviar datos">
    </form>
</body>
</html>