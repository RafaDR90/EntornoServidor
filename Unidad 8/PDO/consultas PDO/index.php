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

//CONSULTA BINDPARAM
echo 'Consulta realizada con BindParam: <br>';
$nom='Pablo';
$s=$conexion->prepare("SELECT * FROM usuarios WHERE nombre=:nombre");
$s->setFetchMode(PDO::FETCH_ASSOC); //Esperamos un array asociativo
$s->bindParam(':nombre',$nom); //Asociamos el parámetro :nombre con la variable $nom
$nom='Luna'; //Cambiamos el valor de la variable $nom
$s->execute(); //Ejecutamos la consulta

while($row=$s->fetch()){
    echo "Codigo: ".$row['codigo']." , Nombre: ".$row['nombre']." , Rol: ".$row['rol']."<br>";
}


//Con bindParam se ejecuta con lo que tenga la variable nombre en el momento de ejecutar, con bindValue
//se ejecuta con el valor que tenía la variable nombre en el momento de crear el bindValue aunque le
//camie el valor a la variable nombre despues de crearlo y antes de hacer el execute.

$conexion=null;
$s=null;