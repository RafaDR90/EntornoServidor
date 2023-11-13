<?php

$servername = "localhost"; // Nombre/IP del servidor
$database = "mibasededatos"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
try {
// Creamos la conexión
    // Para que la conexión a mysql utilice collation UTF-8 añadimos
    //charset=utf8mb4 al string de la conexión.
    $conexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4",
        $username, $password);
//Para que genere excepciones a la hora de reportar errores.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h2>Conexión realizada con éxito</h2>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try{
    $stmt= $conexion->prepare("UPDATE usuarios SET rol=:rol WHERE nombre=:nombre");

    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':rol',$rol);

    $nombre='Pablo';
    $rol=4;

    $stmt->execute();
    echo "Filas actualizadas: ".$stmt->rowCount();
}catch (PDOException $e){
    echo "Error: ".$e->getMessage();
}
$conexion=null;
$stmt=null;