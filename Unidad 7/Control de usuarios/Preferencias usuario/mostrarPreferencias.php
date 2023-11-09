<?php
session_start();
if (isset($_GET['borrar'])){
    session_destroy();
    header("Location: index.php");
}
if (isset($_SESSION['idioma']) and isset($_SESSION['perfil_publico']) and isset($_SESSION['zona_horaria'])){
    echo 'Idioma= '.$_SESSION['idioma'].'<br>';
    echo 'Publico= '.$_SESSION['perfil_publico'].'<br>';
    echo 'Zona horaria= '.$_SESSION['zona_horaria'].'<br>';
}else{
    header("Location: index.php");
}
?>
<a href="mostrarPreferencias.php?borrar=si">Borrar preferencias</a><br>
<a href="index.php">Volver</a>
