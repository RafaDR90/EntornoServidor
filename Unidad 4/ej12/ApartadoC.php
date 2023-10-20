<?php
include "BarajaYPuntuacion.php";
include "Funciones.php"
?>
<h1>Apartado C:</h1>
    <h3>Nueva baraja</h3>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["numJugadores"])) {
    $numJugadores = $_POST["numJugadores"];

    global $baraja;
    $barajaMasJugadores = $baraja;        //creo otra baraja para el apartado C
    muestraCartas($barajaMasJugadores);     //Muestro baraja nueva.

    echo "<h3>Baraja barajada</h3>";
    shuffle($barajaMasJugadores);       //La barajo.

    muestraCartas($barajaMasJugadores);     //La vuelvo a mostrar ya barajada.

    echo "<h3>Reparticion de cartas</h3>";
    $reparticion = repartirVariosJugadores($barajaMasJugadores, $numJugadores);//Reparto las cartas a los jugadores.

    echo "<div id='repartidas'>";

    for ($i = 0; $i < $numJugadores; $i++) {               //Hago un bucle para mostrar las cartas de cada jugador.
        echo "<div><h1>Jugador: " . ($i + 1) . "</h1>";
        muestraCartas($reparticion[$i]);        //Las muestro.
        echo "</div>";
    }
    echo "</div>";
}