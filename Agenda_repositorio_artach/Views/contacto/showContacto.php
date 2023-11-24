<?php

// let's paginate data from an array...
$countries = array(
    // array of countries
);

// how many records should be displayed on a page?
$records_per_page = 1;
// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records(count($contactos));

// records per page
$pagination->records_per_page($records_per_page);

// here's the magic: we need to display *only* the records for the current page
$contactos = array_slice(
    $contactos,
    (($pagination->get_page() - 1) * $records_per_page),
    $records_per_page
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contactos</title>
</head>
<body>
<a href="<?php BASE_URL?>Contacto/nuevoContacto/">Nuevo Contacto</a>
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contactos as $contacto):?>
    <tr>
        <th scope="col"><?=$contacto->getId()?></th>
        <td><?=$contacto->getNombre()?></td>
        <td><?=$contacto->getApellido()?></td>
        <td><?=$contacto->getTelefono()?></td>
        <td><?=$contacto->getCorreo()?></td>
        <td>
            <a href="<?php BASE_URL ?>Contacto/editar/?id=<?=$contacto->getId()?>">Editar</a>
            <a href="<?php BASE_URL ?>Contacto/borrar/?id=<?=$contacto->getId()?>">Borrar</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
<?php
$pagination->render();


