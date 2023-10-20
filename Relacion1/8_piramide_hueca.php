<?php
$espacios=8;
$asterisc=1;
$separacion=1;
for ($i=0;$i<10;$i++){
    echo "&nbsp";
}
echo "*<br>";
for ($i=0;$i<5;$i++){
    for ($j=0;$j<$espacios;$j++){
        echo "&nbsp";
    }
    $espacios-=2;
    echo "*";
    for ($k=0;$k<$separacion;$k++){
        echo "&nbsp";
    }
    echo "*";
    $separacion+=4;
    echo "<br>";
}
for ($i=0;$i<11;$i++){
    echo "*";
}
