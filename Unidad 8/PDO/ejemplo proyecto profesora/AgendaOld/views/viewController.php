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
            <td>
                <form action="<?php echo BASE_URL ?>?controller=">
                    <butto></butto>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>