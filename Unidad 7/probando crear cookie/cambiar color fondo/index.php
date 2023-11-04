<?php
    if (isset($_POST['color'])){
        setcookie('color',$_POST['color']);
        $color=$_POST;
        header('Location: index.php');
    }elseif(!isset($_POST['color']) and isset($_COOKIE['color'])){
        $color=$_COOKIE['color'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Color</title>
    <?php
        if (isset($color)):
    ?>
    <style>
        body{
            background-color: <?= $color ?>;
        }
    </style>
    <?php
        endif;
    ?>
</head>
<body>
<h1>Selecciona un color</h1>
<form method="post" action="#">
    <label for="color">Color:</label>
    <input type="color" id="color" name="color">
    <br>
    <input type="submit" value="Seleccionar">
</form>
</body>
</html>
