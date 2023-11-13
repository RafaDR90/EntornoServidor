<?php
$servername = "localhost";
$database = "mibasededatos";
$username = "root";
$password = "";
// Creamos la conexión
$conexion = mysqli_connect($servername, $username, $password, $database);
// Comprobamos la conexión
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
echo "<h2>Conexión realizada correctamente</h2>";


//USAMOS LA BASE DE DATOS
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $sql);
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        echo "Codigo: " . $row["codigo"] . " , Nombre: " . $row["nombre"] ." ,
Rol: ". $row["rol"]."<br>";
    }
} else {
    echo "No hay registros";
}
mysqli_close($conexion);