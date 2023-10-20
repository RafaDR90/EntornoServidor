<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php
include 'Funciones.php';
include 'BarajaYPuntuacion.php';
global $baraja;
echo "<p><h1>Brisca</h1></p><p><h3>Baraja de cartas:</h3></p>";

echo "<p id='muestraDeCartas'>".muestraCartas($baraja)."</p>";      //Muestro la baraja que voy a usar.

$barajaEnJuego=$baraja;     //creo una baraja para usar.

shuffle($barajaEnJuego);    //Barajo la baraja.

echo "<h3>La barajamos</h3>";

echo muestraCartas($barajaEnJuego);     //Muestro la baraja que voy a usar, esta vez barajada.

$mano=repartirCartas($barajaEnJuego);       //reparto cartas a un jugador y las quito de la baraja.

echo "<br><h1>Apartado A: </h1><h3>Mano del jugador</h3>";

muestraCartas($mano);       //muestro las cartas del jugador.

echo "<h1>Apartado B: </h1><h3>Cojemos 10 cartas de una baraja nueva</h3>";

$barajaNueva=$baraja;       //creo otra baraja para coger 10 cartas.

$cartasAContar=DiezCartasAlAzar($barajaNueva);      //meto en $cartasAContar dies cartas de la nueva baraja.

muestraCartas($cartasAContar);      //Muestro las cartas a contar.

echo "<br><h3>Puntuacion de las 10 cartas: </h3>".CuentaCartas($cartasAContar);     //Cuento las cartas.



/*
 * Compruebo que el metodo usado sea POST y si se ha recibido numJugadores, en caso afirmativo le asigno
 * el valor a la variable.
 */


/*
 * Compruebo si he introducido el numero de jugadores que van a jugar, en caso de que no lo haya introducido
 * se mostrara un formulario solicitando el numero de jugadores, y en caso de que si lo haya introducido se
 * mostrara la baraja sin barajar, a continuacion barajada y a continuacion las cartas de cada jugador.
*/
?>
<h1>Apartado C:</h1>
<form method="POST" action="ApartadoC.php">
    <label for="numJugadores">Numero de jugadores: </label>

    <select name="numJugadores" id="numJugadores">
        <option value="2" selected>2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <input type="submit" value="Enviar">
</form>
</body>
</html>
