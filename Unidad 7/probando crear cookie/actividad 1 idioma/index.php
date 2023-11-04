<?php
    $fraseIngles="Hello";
    $fraseEspañol="Hola";

    if ((!isset($_COOKIE["idioma"])) and isset($_POST["idioma"])){
        setcookie("idioma",$_POST['idioma']);
        header('Location: index.php');
    }elseif (isset($_COOKIE["idioma"])and isset($_POST["idioma"])){
        setcookie("idioma",$_POST['idioma']);
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>Seleccione idioma</p>
    <form method="post" action="#">
        <p>
            <label for="español">Español</label>
            <input type="radio" id="español" name="idioma" value="es">

            <label for="ingles">Ingles</label>
            <input type="radio" id="ingles" name="idioma" value="en">
        </p>

        <input type="submit" value="Cambiar idiom">
    </form>
    <h2><?php if (isset($_COOKIE['idioma'])){
            if ($_COOKIE['idioma']==="es"){echo $fraseEspañol;
            } elseif ($_COOKIE['idioma']==="en"){ echo $fraseIngles;
            }
        } else{echo $fraseEspañol;}?></h2>
</body>
</html>