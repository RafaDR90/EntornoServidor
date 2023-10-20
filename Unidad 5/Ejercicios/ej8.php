<?php
$anoActual = date("Y");
if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["AñoNacimiento"])){
    $añoNacimiento=$_POST["AñoNacimiento"];
    if (($anoActual-$añoNacimiento)<18){
        echo "Vete a dormir";
    }elseif(($anoActual-$añoNacimiento)<85){
        echo "Puedes entrar";
    }else{
        echo "Vete a ver cuarto milenio";
    }
}