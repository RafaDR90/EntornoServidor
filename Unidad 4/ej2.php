<?php
$arrayUsado=[];
$contador=0;
while(count($arrayUsado)<=120){
    $arrayUsado[$contador++]=rand(0,100);
}
print_r($arrayUsado);