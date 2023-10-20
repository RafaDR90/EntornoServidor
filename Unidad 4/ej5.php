<?php
$animales=[];
for($i=0;$i<rand(20,30);$i++){
    $animales[$i]= "&#".rand(128000,128060)." ";
}
function mostrarAnimales($array){
    foreach($array as $animal){
        echo $animal." ";
    }
};

mostrarAnimales($animales);
$animalAEliminar=rand(0,count($animales));
$animalCodigoAEliminar=$animales[$animalAEliminar];
echo "<br>Animal a eliminar: ".$animales[$animalAEliminar];

foreach ($animales as $key => $valor){
    if($valor==$animalCodigoAEliminar){
        unset($animales[$key]);
    }
}
echo "<br>";
mostrarAnimales($animales);