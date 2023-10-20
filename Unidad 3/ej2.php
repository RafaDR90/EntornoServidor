<?php


if(isset($_GET["num1"])&&isset($_GET["num2"])&&isset($_GET["operador"])) {
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $operador=urlencode($_GET["operador"]);
}

function sumar(int $numero1,int $numero2){
    if(is_numeric($numero1)&&is_numeric($numero2)){
        return ($numero1+$numero2);
    }else{
        throw new Exception("Numero1 o numero2 no es un numero!");
    }
}

function restar(int $numero1,int $numero2){
    if(is_numeric($numero1)&&is_numeric($numero2)){
        return ($numero1-$numero2);
    }else{
        throw new Exception("Numero1 o numero2 no es un numero!");
    }
}

function multiplicar(int $numero1,int $numero2){
    if(is_numeric($numero1)&&is_numeric($numero2)){
        return ($numero1*$numero2);
    }else{
        throw new Exception("Numero1 o numero2 no es un numero!");
    }
}

function dividir(int $numero1,int $numero2){
    if(is_numeric($numero1)&&is_numeric($numero2)){
        return ($numero1/$numero2);
    }else{
        throw new Exception("Numero1 o numero2 no es un numero!");
    }
}

function calculador(int $num1, int $num2, $operador)
{
    switch ($operador) {
        case "+":
            try {
                return sumar($num1, $num2);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        case "-":
            try {
                return restar($num1, $num2);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        case "%2A":
            try {
                return multiplicar($num1, $num2);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        case "%2F":
            try {
                return dividir($num1, $num2);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
    }
}
$resultado= calculador($num1,$num2,$operador);
echo $resultado;
