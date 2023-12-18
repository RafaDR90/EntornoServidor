<?php use controllers\categoriaController; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/styles/Header.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/styles/main.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/styles/normalize.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/styles/usuario/registro.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/styles/usuario/login.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/styles/categoria/gestionCategoria.css">
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
            <?php endif;?>
        <?php else: ?>
            <li><a href="<?= BASE_URL ?>usuario/indetifica/">Identificate</a></li>
            <li><a href="<?= BASE_URL ?>usuario/registro/">Crear cuenta</a></li>
            <?php endif; ?>
            <li><a href="<?=BASE_URL?>carrito/mostrarCarrito/">Ver Carrito</a></li>
        </ul>
        <?php $categorias= categoriaController::obtenerCategorias();?>
        <nav class="navPrincipal">
            <ul style="display: flex; gap: 15px">
                <?php foreach ($categorias as $categoria):?>
                    <li>
                        <a href="<?=BASE_URL?>producto/obtenerProductosPorId/?idCategoria=<?= $categoria->getId() ?>"><?php echo $categoria->getNombre(); ?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </nav>
        <div class="mensajesError">
        <?php if (isset($exito)): ?>
            <strong class="exito"><?=$exito?></strong>
        <?php elseif (isset($error)): ?>
            <strong class="error"><?=$error?></strong>
        <?php endif; ?>
        </div>
    </header>
<main>
