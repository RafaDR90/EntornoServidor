<?php
$numeros=[
    'uno'=>'one',
    'dos'=>'two',
    'tres'=>'tree',
    'cuatro'=>'four',
    'cinco'=>'five',
    'seis'=>'six',
    'siete'=>'seven',
    'ocho'=>'eight',
    'nueve'=>'eleven',
    'dies'=>'twelve'
    ];
echo "<table border='solid black'><tr><th>Español</th><th>Ingles</th></tr>";
foreach ($numeros as $esp => $eng){
    echo "<tr><td>$esp</td><td>$eng</td></tr>";
}
echo "</table>";