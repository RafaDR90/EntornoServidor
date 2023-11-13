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
    $preparada=$conexion->prepare("SELECT * FROM usuarios WHERE rol=:rol");
    $preparada->bindParam(':rol',$rol);
    $rol=2;
    $preparada->execute();
    //Leemos los datos del recorset que nos devuelve el select en el objeto pdosstatment
    $data=$preparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $row){
        echo "<p>Nombre: ".$row['nombre']."</p>";
    }
    echo "<p><strong>Numero de usuario con rol".$rol."</strong>".$preparada->rowCount()."</p>";
}catch (PDOException $e){
    die( "Error: ".$e->getMessage());

}