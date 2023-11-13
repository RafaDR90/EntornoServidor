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


//CONSULTA SIN PAREMETROS
try{
    $sql='select nombre,clave,rol from usuarios';
    $usuarios=$conexion->query($sql);
    $usuarios->rowCount(); //ESTO ES PARA ONTAR LOS USUARIOS QUE HA RECIBIDO AUNQUE NO LO ESTOY USANDO
    foreach ($usuarios as $usu){
        print "Nombre : ".$usu['nombre']."<br>";
        print "clave : ".$usu['clave']."<br>";
    }
}catch (PDOException $e){
    echo 'Error con la base de datos: '. $e->getMessage();
}


//CONSULTAS PREPARADAS PARA HACER INSERTS
$ins = $conexion->prepare("INSERT INTO usuarios(nombre, clave, rol) VALUES (:nombre, :clave, :rol)");
//o por orden
$insOrden = $conexion->prepare("INSERT INTO usuarios(nombre, clave, rol) values (?, ?, ?)");

//PARA USARLAS
//puedo usar ->bindParam() para añadir una o mas o ->binValue para añadir solo una
//ANONIMOS
//$ins->bindParam(1, $nombre,);
//$ins->bindParam(2, $passw);
//$ins->bindParam(3, $rol);
//POR NOMBRE
$ins->bindParam(':nombre', $nombre,PDO::PARAM_STR,40);
$ins->bindParam(':clave', $passw,PDO::PARAM_STR,40);
$ins->bindParam(':rol', $rol,PDO::PARAM_INT);

$nombre='DANIEL';
$passw='asdasd';
$rol='MEDICO';
$ins->execute();

$nombre='RAFA';
$passw='asdasSDSd';
$rol='ABOGADO';
$ins->execute();

$conexion = null;
?>
