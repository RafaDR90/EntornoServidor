<?php
if(empty($_GET["pixeles"])){
    echo "Introduce un numero de pixeles";
}elseif($_GET["pixeles"]<=1000 && $_GET["pixeles"]>=10){
    echo '<svg width="200" height="100">
    <line x1="0" y1="50" x2="'.$_GET["pixeles"].'" y2="50" stroke="black" stroke-width="2" />
    </svg>';
}else{
    echo "El numero tiene que ser entre 10 y 1000";
}