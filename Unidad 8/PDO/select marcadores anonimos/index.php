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
    $preparada=$conexion->prepare("SELECT * FROM usuarios WHERE rol=?");
    $preparada->bindParam(1,$rol);
    $rol=2;
    $preparada->execute();

    //Leemos los datos del recordset que nos devuelve Select en el objeto PDOStatement.
    while($fila=$preparada->fetch(PDO::FETCH_ASSOC)){
        echo "<p>Nombre: ".$fila['nombre']." , Rol: ".$fila['rol']."</p>";
    }
}catch (PDOException $e){
    die( "Error: ".$e->getMessage());

}