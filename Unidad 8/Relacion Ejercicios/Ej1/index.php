<?php
$servername = "localhost"; // Nombre/IP del servidor
$database = "mistiendas"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
// Creamos la conexión utilizando la clase Mysqli
$conexion=new Mysqli($servername, $username, $password, $database);
if ($conexion->connect_error)
{
    die ("Error en conexión base datos: ".$conexion->connect_error);
}else {
    echo "<h2>Conexión realizada correctamente</h2>";
    // Cerramos la conexión cuando terminamos
    $conexion->close();
}
?>
