<?php session_start() ?>
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

/*
 * Comprobamos si existe la variable session, si existe pues la metemos en la variable normal que vamos a
 * usar ya que asi es mas optima a la hora de leerla, en caso de que no exista pues la crea y la mete
 * en la variable normal.
 * */
if (!isset($_SESSION['barajaEnJuego'])) {
    $_SESSION["barajaEnJuego"] = $baraja; //creo una baraja para usar.

    shuffle($_SESSION["barajaEnJuego"]);    //Barajo la baraja.
    $barajaEnJuego=$_SESSION["barajaEnJuego"];
}else{
    $barajaEnJuego=$_SESSION["barajaEnJuego"];
}

echo "<h3>La barajamos</h3>";

echo muestraCartas($barajaEnJuego);     //Muestro la baraja que voy a usar, esta vez barajada.

$mano=repartirCartas($barajaEnJuego);       //reparto cartas a un jugador y las quito de la baraja.

echo "<br><h1>Apartado A: </h1><h3>Mano del jugador</h3>";

muestraCartas($mano);       //muestro las cartas del jugador.

echo "<h1>Apartado B: </h1><h3>Cojemos 10 cartas de una baraja nueva</h3>";

/*
 * creo otra baraja nueva para coger 10 cartas, la barajo, cojo 10 cartas al azar y las meto en
 * una variable session, en caso de que ya exista simplemente se la asigno a la variable.
 * */
if (!isset($_SESSION["cartasAContar"])){
    $barajaNueva=$baraja;       //creo nueva baraja
    shuffle($barajaNueva);  //Baranjo cartas
    $_SESSION["cartasAContar"]=DiezCartasAlAzar($barajaNueva);  //Cojo 10 cartas al azar y creo variable de session.
    $cartasAContar=$_SESSION["cartasAContar"]; //Las asigno a una variable
}else{
    $cartasAContar=$_SESSION["cartasAContar"];  //las asigno a una variable en caso de que exista la de session.
}

muestraCartas($cartasAContar);      //Muestro las cartas a contar.

echo "<br><h3>Puntuacion de las 10 cartas: </h3>".CuentaCartas($cartasAContar);     //Cuento las cartas.

$barajaMasJugadores=$baraja;        //creo otra baraja para el apartado C

/*
 * Compruebo que el metodo usado sea POST y si se ha recibido numJugadores, en caso afirmativo le asigno
 * el valor a la variable.
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["numJugadores"])) {
    $numJugadores = $_POST["numJugadores"];
}
/*
 * Compruebo si he introducido el numero de jugadores que van a jugar, en caso de que no lo haya introducido
 * se mostrara un formulario solicitando el numero de jugadores, y en caso de que si lo haya introducido se
 * mostrara la baraja sin barajar, a continuacion barajada y a continuacion las cartas de cada jugador.
*/
 if (!isset($numJugadores)):?>
<h1>Apartado C:</h1>
<form method="POST" action="./index.php">
    <label for="numJugadores">Numero de jugadores: </label>

    <select name="numJugadores" id="numJugadores">
        <option value="2" selected>2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <input type="submit" value="Enviar">
    <?php else:?>
            <h1>Apartado C:</h1>
            <h3>Nueva baraja</h3>
            <?php
            muestraCartas($barajaMasJugadores);     //Muestro baraja nueva.

            echo "<h3>Baraja barajada</h3>";
            shuffle($barajaMasJugadores);       //La barajo.

            muestraCartas($barajaMasJugadores);     //La vuelvo a mostrar ya barajada.

            echo "<h3>Reparticion de cartas";
            $reparticion=repartirVariosJugadores($barajaMasJugadores,$numJugadores);//Reparto las cartas a los jugadores.

            echo "<div id='repartidas'>";

            for ($i=0;$i<$numJugadores;$i++){               //Hago un bucle para mostrar las cartas de cada jugador.
                echo "<div><h1>Jugador: ".($i+1)."</h1>";
                muestraCartas($reparticion[$i]);        //Las muestro.
                echo "</div>";
            }
            echo "</div>";

            /*
             * Con este cierre, cierro la session y aunque actualice la pagina con f5 las variables de las cartas
             * no van a cambiar.
             * */
            //session_write_close();

            /*
            * Y on este, destruyo las variables, por lo que el programa funciona correctamente, desde su inicio a su fin,
            * si despues de su fin, actualizo la pagina con f5, las cartas si cambiaran, pero el pograma ya abrá llegado
            * a su fin sin cambiar las cartas asi que lo veo mas optimo, pero las dos son opciones viables.
            * */
            session_destroy();

            unset($numJugadores);
            endif;
            ?>
</form>
</body>
</html>
