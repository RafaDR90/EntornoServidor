<?php

/**
 * Muestra las cartas de una baraja o mano.
 *
 * @param array $manoDeCartas Un array de cartas a mostrar.
 * @return void
 */
function muestraCartas($manoDeCartas){
    foreach ($manoDeCartas as $carta){
        echo "<img src='./imagenes/$carta'>";
    }
    echo "<br>";
}


/**
 * Reparte cartas extrayendolas de la baraja.
 * @param $baraja
 * @return array
 */
function repartirCartas(&$baraja){
    $mano=[];
    for ($i=0;$i<3;$i++){
        $mano[$i]=array_pop($baraja);
    }
    return $mano;
}

/**
 * Extrae diez cartas de una baraja.
 *
 * @param $baraja Baraja de la cual se van a extraer las cartas.
 * @return array
 */
function DiezCartasAlAzar($baraja){
    $num=0;
    $cartas=[];
    for ($i=0;$i<10;$i++){
        $num=rand(0,(count($baraja)-1));
        if (isset($baraja[$num])){
            $cartas[$i]=$baraja[$num];
            unset($baraja[$num]);
        }else{
            $i-=1;
        }
    }
    return $cartas;
}

/**
 * Cuenta los puntos totales de una baraja o mano introducida por parametro.
 *
 * @param array $baza Baza de cartas a contar.
 * @return int Puntos totales.
 */
function CuentaCartas($baza){
    global $puntos;
    $puntuacion=0;
    foreach ($baza as $carta){
        preg_match('/\d+/', $carta, $matches);
        $puntuacion+=$puntos["$matches[0]"];
    }
    return $puntuacion;
}


/**
 * Reparte tres cartas a la cantidad de jugadores introducida por parametro extrayendolas de
 * una baraja tambien introducida por parametro.
 *
 * @param array $baraja Baraja de la que se van a extraer las cartas.
 * @param $numJugadores Cantidad de jugadores a los que se le va a repartir.
 * @return array Cartas repartidas.
 */
function repartirVariosJugadores($baraja, $numJugadores){
    $mano=array_fill(0,intval($numJugadores),null);
    for($i=0;$i<3;$i++){
        for($j=0;$j<count($mano);$j++){
            $mano[$j][$i]=array_pop($baraja);
        }
    }
    return $mano;
}