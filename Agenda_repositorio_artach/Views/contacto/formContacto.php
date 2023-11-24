<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Form Contacto</title>
</head>
<body>
<form action="<?=BASE_URL?>Contacto/newEditContacto/" method="post">
    <?php if(isset($contacto)):?>
    <input type="hidden" name="data[id]" value="<?=$contacto->getId()?>">
    <?php endif; ?>

    <h2><?=(isset($contacto))?'Modificar':'Nuevo'?> Contacto</h2>
    <p><a href="<?= BASE_URL ?>">Cancelar</a></p>

    <p>
        <label for="nombre">Nombre </label>
        <input type="text" id="nombre" placeholder="Nombre"
        name="data[nombre]" value="<?=(isset($contacto))?$contacto->getNombre():'';?>">
    </p>
    <p>
        <label for="apellidos">Apellidos </label>
        <input type="text" id="apellidos" placeholder="Apellidos"
        name="data[nombre]" value="<?=(isset($contacto))?$contacto->getApellidos():''?>">
    </p>
    <p>
        <label for="correo">Correo </label>
        <input type="text" id="correo" placeholder="Correo"
        name="data[correo]" value="<?=(isset($contacto))?$contacto->getCorreo():''?>">
    </p>
    <p>
        <label for="direccion">Direccion </label>
        <input type="text" id="direccion" placeholder="Direccion"
        name="data[direccion]" value="<?=(isset($contacto))?$contacto->getDireccion():''?>">
    </p>
    <p>
        <label for="telefono">Telefono </label>
        <input type="text" id="telefono" placeholder="Telefono"
               name="data[telefono]" value="<?=(isset($contacto))?$contacto->getTelefono():''?>">
    </p>
    <p>
        <label for="fechaNac">Fecha de nacimiento </label>
        <input type="text" id="fechaNac" placeholder="Fecha de nacimiento"
               name="data[fechaNac]" value="<?=(isset($contacto))?$contacto->getFechaNacimiento():''?>">
    </p>
    <p><input type="submit" value="<?=(isset($contacto))?'Editar':'Nuevo'?>"></p>
</form>
</body>
</html>