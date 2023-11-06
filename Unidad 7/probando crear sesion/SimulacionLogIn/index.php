<?php
    session_start();
var_dump($_SESSION['user']);
    if(!isset($_SESSION['user'])|| (!isset($_SESSION['pw']))){
        header('Location: formulario.php');
    }elseif (isset($_SESSION['user']) && (isset($_SESSION['pw']))){
        header('Location: bienvenido.php');
    }
?>