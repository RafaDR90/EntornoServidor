<?php
require_once 'AutoLoad.php';
// Importa las clases necesarias
use lib\BaseDatos_e_Np;
use models\Contacto_e_Np;

// Crea una instancia de la clase de conexión a la base de datos
$conexion =new BaseDatos_e_Np();

// Crea una instancia de la clase Contacto_e_Np
$contacto = new Contacto_e_Np();

// Supongamos que deseas obtener todos los contactos
$resultado=$conexion->prepara("SELECT * FROM contactos");



// Muestra la información en tu vista
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
</head>
<body>

<h1>Lista de Contactos</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Fecha de Nacimiento</th>
    </tr>

    <?php foreach ($resultado as $contacto) : ?>
        <tr>
            <td><?php echo $contacto['id']; ?></td>
            <td><?php echo $contacto['nombre']; ?></td>
            <td><?php echo $contacto['apellidos']; ?></td>
            <td><?php echo $contacto['correo']; ?></td>
            <td><?php echo $contacto['direccion']; ?></td>
            <td><?php echo $contacto['telefono']; ?></td>
            <td><?php echo $contacto['fecha_nacimiento']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
