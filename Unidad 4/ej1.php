<?php
$fun1=function (){
    $array1=[];
    for($i=0;$i<8;$i++){
        $array1[$i]=rand(0,100);
    }
    return $array1;
};

$arrayUsado=$fun1();

$arrayOrdenado=$arrayUsado;     //Clona el array
sort($arrayOrdenado);   //Ordena el array
mostrarArray($arrayOrdenado);

echo "<br> Tamaño del array: ".count($arrayUsado); //Count muestra el tamaño del array

if(isset($_GET["parametro"])){
    $urlVar=$_GET["parametro"];
    if(array_search($urlVar,$arrayUsado)){
        echo "el elemento: $urlVar esta en el array";
    }else{
        echo "No existe";
    }
}else{
    echo "El parametro no esta en la URL";
}

function mostrarArray($array){
    print_r($array);
}