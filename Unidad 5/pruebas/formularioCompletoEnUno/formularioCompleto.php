<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if ($_POST["usuario"]== "usuario" and $_POST["contraseña"]=="1234"){
        header("Location: bienvenido.php");
    }else{
        $err=true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        if (isset($err)){
            echo "<p>Revise usuario y contraseña</p>";
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="usuario">Usuario: </label>
        <input value="<?php if (isset($_POST["usuario"])) echo $_POST["usuario"]?>" id="usuario" name="usuario" type="text">

        <label for="contraseña">Contraseña:</label>
        <input id="contraseña" name="contraseña" type="password">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>