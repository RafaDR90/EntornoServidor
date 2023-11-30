<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>TIENDA</h1>
        <ul>
        <?php if (isset($_SESSION['identity'])): ?>
            <li><a href="<?= BASE_URL ?>usuario/logout/">Cerrar sesion</a></li>
            <li><a href="<?= BASE_URL ?>usuario/registro/">Crear cuenta</a></li>
        <?php else: ?>
            <li><a href="<?= BASE_URL ?>usuario/indetifica/">Identificate</a></li>
            <li><a href="<?= BASE_URL ?>usuario/registro/">Crear cuenta</a></li>
            <?php endif; ?>
    </header>