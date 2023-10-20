<?php
$num=rand(1,6);
$num2=rand(1,6);
$dado1=match ($num){
    1=>"dado uno.jpg",
    2=>"dado dos.jpg",
    3=>"dado tres.jpg",
    4=>"dado cuatro.jpg",
    5=>"dado cinco.jpg",
    6=>"dado seis.jpg"
};
$dado2=match ($num2){
    1=>"dado uno.jpg",
    2=>"dado dos.jpg",
    3=>"dado tres.jpg",
    4=>"dado cuatro.jpg",
    5=>"dado cinco.jpg",
    6=>"dado seis.jpg"
};

echo "<img src='./img/$dado1'><img src='./img/$dado2'><br>";
if ($num==$num2){
    echo "Ha salido una pareja de numero iguales!";
}elseif($num<$num2){
    echo "El dado mayor es el $num2!";
}else{
    echo "El dado mayor es el $num!";
}

function valorAString($numero){
    $resultado=match ($numero){
        1=>"dado uno.jpg",
        2=>"dado dos.jpg",
        3=>"dado tres.jpg",
        4=>"dado cuatro.jpg",
        5=>"dado cinco.jpg",
        6=>"dado seis.jpg"
    };
    return $resultado;
}