<?php
if (!isset($_COOKIE['cantidad'])){
    setcookie("cantidad","1",time()+31536000);
    $frase="Es la primera vez que entras";
}else{
    $cantidad=(int)$_COOKIE["cantidad"];
    $cantidad+=1;
    setcookie("cantidad",$cantidad,time()+31536000);
    $frase="Has entrado $cantidad veces";
}
?>
<h2><?= $frase ?></h2>
