<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['createCookie']) and $_POST['username']!=""){
            setcookie('user',$_POST['username'],time()+$_POST['duration']);
        }elseif (isset($_POST['deleteCookie'])){
            unset($_COOKIE['user']);
            setcookie("user","",time()-100);

        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Cookies</title>
</head>
<body>
<h1>Formulario de Cookies</h1>
<form method="post" action="#">
    <p><label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username"></p>

    <p><label for="duration">Duración de la cookie (entre 1 y 60 segundos):</label>
        <input type="number" name="duration" id="duration" min="1" max="60" value=10></p>

    <p><input type="submit" name="createCookie" value="Crear cookie">
        <input type="submit" name="deleteCookie" value="Borrar cookie">
        <input type="submit" name="refreshPage" value="Actualizar página"></p>
</form>
<?php if (isset($_COOKIE['user'])): ?>
    <p>Hola <?php echo $_COOKIE['user'] ?></p>
<?php else: ?>
    <p>No hay ninguna cookie almacenada</p>
<?php endif; ?>
</body>
</html>
