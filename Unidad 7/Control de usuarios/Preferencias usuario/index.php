<?php
session_start();
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['idioma']) && isset($_POST['perfil_publico'])&& isset($_POST['zona_horaria'])){

            $_SESSION['idioma']=$_POST['idioma'];
            $_SESSION['perfil_publico']=$_POST['perfil_publico'];
            $_SESSION['zona_horaria']=$_POST['zona_horaria'];
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
<fieldset>
    <legend>Preferencias</legend>
    <form action="#" method="post">
        <p><label for="idioma">Idioma: </label>
        <select name="idioma" id="idioma">
            <option value="es">Español</option>
            <option value="en">English</option>
        </select>
        </p>
        <p>
            <label for="perfil_publico">Perfil publico</label>
            <select name="perfil_publico" id="perfil_publico">
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
        </p>
        <p>
            <label for="zona_horaria">Zona horaria</label>
            <select name="zona_horaria" id="zona_horaria">
                <option value="gmt-2">GMT-2</option>
                <option value="gmt-1">GMT-1</option>
                <option value="gmt">GMT</option>
                <option value="gmt+1">GMT+1</option>
                <option value="gmt+2">GMT+2</option>
            </select>
        </p>
        <p><input type="submit" value="Establecer preferencias"></p>
    </form>
    <a href="mostrarPreferencias.php">Mostrar preferencias</a>
</fieldset>
<?php
if (session_status() == PHP_SESSION_ACTIVE && !empty(session_id())){
    if (isset($_SESSION['idioma'])){
        if ($_SESSION['idioma']=='es'){
            ?><h1>Bienvenido</h1>
<?php
        }elseif ($_SESSION['idioma']=='en'){
            ?><h1>Welcome</h1>
<?php
        }
    }
}
?>
</body>
</html>