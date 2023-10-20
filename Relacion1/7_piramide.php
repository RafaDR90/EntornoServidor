<?php
$espacios=8;
$asterisc=1;
for($i=0;$i<5;$i++){
    for ($j=0;$j<$espacios;$j++){
        echo "&nbsp";
    }
    $espacios-=2;
    for ($k=0;$k<$asterisc;$k++){
        echo "*";
    }
    $asterisc+=2;
    echo "<br>";
}