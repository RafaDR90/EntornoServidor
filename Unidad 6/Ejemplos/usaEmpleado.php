<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        require_once ('empleado.php');
        $luis=new Empleado();
        $luis->setNombre("Luis Maria");
        $luis->setApellidos("Franco Garcia");
    ?>
    <h1>
        Datos de <?= $luis->getNombre()." ".$luis->getApellidos(); ?>
    </h1>
</body>
</html>