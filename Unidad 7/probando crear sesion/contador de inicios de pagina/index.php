<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
session_name("Rafa");
    session_start();
    if (isset($_SESSION['contador'])){
        $_SESSION['contador']+=1;
        echo "<p>Has iniciado sesion ".$_SESSION['contador']." veces</p>";
    }else{
        $_SESSION['contador']=1;
        echo "<p> Has iniciado la primera vez </p>";
    }
    echo "<p>El valor de session_id es: ".session_id()."<br>";
    echo "El valor de la cookie de session es ".$_COOKIE['Rafa']."<br>";
    echo session_name()."</p>";
?>
</body>
</html>
