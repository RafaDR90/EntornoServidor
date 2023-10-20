<?php
$num=$_GET["numero"];
if(is_numeric($num)){
    $resultado=factorial($num);
    echo $resultado;
}
function factorial($numero){
    if($numero<=1){
        return 1;
    }else{
        return $numero * factorial($numero - 1);
    }
}