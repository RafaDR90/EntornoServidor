<?php
$datos=$_POST["datos"];
$lenguajes=$_POST["lenguajes"];
$informacion=$_POST["info"];
echo "<h1>Datos</h1>";
foreach ($datos as $key=>$valor){
    echo "$key: $valor<br>";
}
echo "<h3>Lenguajes conocidos: </h3>";
foreach ($lenguajes as $lenguaje){
    echo $lenguaje." ";
}
echo "<h4>Mas informacion</h4>";
foreach ($informacion as $key => $valor){
    echo "$key: $valor<br>";
}