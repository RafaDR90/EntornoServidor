<?php
$errores=[];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['user']) && isset($_POST['pw'])){
        if (strtolower($_POST['user'])!='rafa'){
            $errores['user']="ha habido un error con el usuario";
        }
        if ($_POST['pw']!="rafa"){
            $errores['pw']="ha habido un error con la contraseña";
        }
        if (count($errores)==0){
            session_start();
            $_SESSION['user']=$_POST['user'];
            $_SESSION['pw']=$_POST['pw'];
            header('Location: index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Inicio de Sesión</title>
</head>
<body>
<h1>Iniciar Sesión</h1>

<form method="post" action="formulario.php">
    <p>
        <label for="user">Usuario:</label>
        <input type="text" id="uer" name="user">
    </p>
    <p>
        <label for="pw">Contraseña:</label>
        <input type="password" id="pw" name="pw">
    </p>
    <p>
        <input type="submit" value="Iniciar Sesión">
    </p>
</form>
</body>
</html>
