<?php
$arrayUsado=[];
for ($i=0;$i<100;$i++){
    $arrayUsado[$i]=rand(0,100);
}


$cuadrados=array_map(function ($array){
    return $array**2;
},$arrayUsado);


$cubo=array_map(function ($array){
    return $array**3;
},$arrayUsado);

echo "<table border='solid black'><tr><th>Valor</th><th>Cuadrado</th><th>Cubo</th></tr>";
for($i=0;$i<count($arrayUsado);$i++){
    echo "<tr>";
    for ($j=0;$j<3;$j++) {
        switch ($j){
            case 0:
                echo "<td>$arrayUsado[$i]</td>";
                break;
            case 1:
                echo "<td>$cuadrados[$i]</td>";
                break;
            case 2:
                echo "<td>$cubo[$i]</td>";
        }
    }
    echo "</tr>";
}
echo "</tr></table>";