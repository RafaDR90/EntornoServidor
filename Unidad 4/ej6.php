<?php
$numeros=[];
for($i=0;$i<15;$i++){
    $numeros[$i]=rand(1,100);
}

mostrar($numeros);
$numerosInvertidos=array_reverse($numeros);
echo "<br>";
mostrar($numerosInvertidos);


function mostrar($array){
    foreach ($array as $numero){
        echo $numero." ";
    }
}