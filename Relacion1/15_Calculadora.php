<?php
try{
    if(empty($_GET["num1"])||empty($_GET["num2"])||empty($_GET["operador"])){
        echo "Falta uno o mas datos para operar";
    }elseif($_GET["operador"]=="suma"){
        echo ($_GET["num1"]+$_GET["num2"]);
    }elseif($_GET["operador"]=="resta"){
        echo ($_GET["num1"]-$_GET["num2"]);
    }elseif($_GET["operador"]=="multiplicar"){
        echo ($_GET["num1"]*$_GET["num2"]);
    }elseif($_GET["operador"]=="dividir"){
        echo ($_GET["num1"]/$_GET["num2"]);
    }
}catch(exception $e){
    echo"ha habido algun problema: ".$e;
}
