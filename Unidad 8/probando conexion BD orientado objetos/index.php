<?php
$servername = "localhost"; // Nombre/IP del servidor
$database = "mibasededatos"; // Nombre de la BBDD
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

}

//USAMOS LA BASE DE DATOS
$sql = "SELECT * FROM usuarios";
if ($resultado = $conexion->query($sql)) {
// obtenemos objetos en la consulta
    while ($obj = $resultado->fetch_object()) {
        echo "Codigo: ". $obj->codigo. " , Nombre: ". $obj->nombre . " , Rol: "
            . $obj->rol . "<br>";
    }

} else {
    echo "No hay registros";
}

//INSERTAR DATOS
//$sql = "INSERT INTO usuarios VALUES(null,'Mateo','mateo123',3);";
//$insert = $conexion->query($sql);
//if ($insert) {
//    echo 'Datos insertados correctamente';
//} else {
//    echo "Error: ".$conexion->connect_error;
//}


//BORRAR DATOS
$sql = "DELETE FROM usuarios WHERE nombre='Mateo'";
$delete = $conexion->query($sql);
if ($delete) {
    echo 'Datos borrados correctamente';
} else {
    echo "Error: ".$conexion->connect_error;
}


$conexion->close();
?>
