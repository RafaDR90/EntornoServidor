<?php
$servername = "localhost"; // Nombre/IP del servidor
$database = "mistiendas"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
try {
// Creamos la conexión
    // Para que la conexión a mysql utilice collation UTF-8 añadimos
    //charset=utf8mb4 al string de la conexión.
    $BD = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4",
        $username, $password);
//Para que genere excepciones a la hora de reportar errores.
    $BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<form action=""></form>







//$nom='Pablo';
//$sql=$BD->prepare("SELECT * FROM usuarios WHERE nombre=:nombre");
//$sql->setFetchMode(PDO::FETCH_ASSOC); //Esperamos un array asociativo
//$sql->bindParam(':nombre',$nom); //Asociamos el parámetro :nombre con la variable $nom
//$nom='Luna'; //Cambiamos el valor de la variable $nom
//$sql->execute(); //Ejecutamos la consulta
//$resultado=$sql->fetchAll();



//$BD=null;
//$sql=null;