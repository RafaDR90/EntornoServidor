<?php
$array=[];
for ($i=0;$i<10;$i++){
    $array[$i]=rand(0,1);
}

print_r($array);
echo "<br>";
$array2=array_map(function ($array){
    return ($array==1)? 0 : 1;
},$array);
print_r($array2);