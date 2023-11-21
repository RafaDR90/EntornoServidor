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
        <th>Acciones</th>
    </tr>

    <?php foreach ($resultado as $contacto) : ?>
        <tr>
            <td><?php echo $contacto->getId(); ?></td>
            <td><?php echo $contacto->getNombre(); ?></td>
            <td><?php echo $contacto->getApellidos(); ?></td>
            <td><?php echo $contacto->getEmail(); ?></td>
            <td><?php echo $contacto->getDireccion(); ?></td>
            <td><?php echo $contacto->getTelefono(); ?></td>
            <td><?php echo $contacto->getFechaNacimiento(); ?></td>
            <td>
                <a href="<?php BASE_URL?>index.php?controller=Contacto&action=editContacto&id=<?php $contacto->getId(); ?>">Editar</a>
                <a href="<?php BASE_URL?>index.php?controller=Contacto&action=delContacto&id=<?php $contacto->getId(); ?>">Borrar</a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>