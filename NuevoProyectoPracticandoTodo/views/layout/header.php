<?php use controllers\categoriaController; ?>
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
            <?php if ($_SESSION['identity']->rol=='admin'): ?>
            <li><a href="<?= BASE_URL ?>categoria/gestionarCategorias/">Gestionar categorias</a></li>
            <li><a href="">Gestionar productos</a></li>
            <li><a href="">Gestionar productos</a></li>
            <?php endif;?>
        <?php else: ?>
            <li><a href="<?= BASE_URL ?>usuario/indetifica/">Identificate</a></li>
            <li><a href="<?= BASE_URL ?>usuario/registro/">Crear cuenta</a></li>
            <?php endif; ?>
    </header>
    <?php $categorias= categoriaController::obtenerCategorias();?>
    <nav>
        <ul style="display: flex; gap: 15px">
        <?php foreach ($categorias as $categoria):?>
        <li>
            <a href="<?php BASE_URL ?>Categoria/ver/?id<?=$categoria->getId()?>"><?php echo $categoria->getNombre(); ?></a>
        </li>
        <?php endforeach;?>
        </ul>
    </nav>