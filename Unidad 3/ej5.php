<?php
function fechaCastellano (){
    $fecha=date("D-d-m-Y");
    $arreglo=explode("-",$fecha);
    $fechaEspañol=match ($arreglo[0]){
        "Mon"=>"Lunes, ",
        "Tue"=>"Martes, ",
        "Wed"=>"Miercoles, ",
        "Thu"=>"Jueves, ",
        "Fri"=>"Viernes, ",
        "Sat"=>"Sabado, ",
        "Sun"=>"Domingo, "
    };

    $mes=match($arreglo[2]){
        "01"=>"Enero",
        "02"=>"Febrero",
        "03"=>"Marzo",
        "04"=>"Abril",
        "05"=>"Mayo",
        "06"=>"Junio",
        "07"=>"Julio",
        "08"=>"Agosto",
        "09"=>"Septiembre",
        "10"=>"Octubre",
        "11"=>"Noviembre",
        "12"=>"Diciembre"
        };
    $fechaEspañol=$fechaEspañol.$arreglo[1]." de ".$mes." de ".$arreglo[3];
    return $fechaEspañol;
}

echo fechaCastellano();