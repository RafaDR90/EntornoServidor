

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label for="nombre_sesion">Nombre de la Sesión:</label>
    <input type="text" id="nombre_sesion" name="nombre_sesion" required><br>

    <label for="usuario">Nombre de Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>

    <input type="submit" name="submit" value="Crear Sesión">
</form>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'):
    if (isset($_POST['nombre_sesion']) and isset($_POST['usuario'])):
        session_name($_POST['nombre_sesion']);
        session_start();
        $_SESSION['usuario']=$_POST['usuario'];
?>
    <h3>Nombre de la sesion</h3>
<p><?php echo session_name() ?></p>

    <h3>Nombre de usuario</h3>
        <p><?php echo $_SESSION['usuario']  ?></p>

    <h3>Hora ultima entrada</h3>
        <p><?php   ?></p>
    <h3>Nº de entradas en la web</h3>
        <p><?php   ?></p>

    <h3>Pagina web en la que ha entrado:</h3>
        <p><?php echo $_SERVER['PHP_SELF']  ?></p>

    <h3>La funcion session_encode devuelve la cadena:</h3>
        <p><?php   ?></p>

    <h3>Ahora borramos el contenido de la variable usuario y observamos como varia</h3>
        <p><?php echo session_encode() ?></p>

    <h3>Y en la funcion session_encode al final de la cadena ya no aparece usuario:</h3>
        <p><?php unset($_SESSION['usuario']); echo session_encode();  ?></p>
    <?php endif;
    endif;?>
<a href="index.php">Volver</a>
</body>
</html>
