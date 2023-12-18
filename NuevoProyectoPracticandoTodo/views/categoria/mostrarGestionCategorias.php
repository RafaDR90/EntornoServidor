<div class="gestionCategoriasContainer">
<?php use controllers\categoriaController; ?>
<?php if (isset($errores)): ?>
    <ul>
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<ul>
    <?php if (isset($_SESSION['identity'])&& $_SESSION['identity']['rol']=='admin'): ?>
    <?php $categorias= categoriaController::obtenerCategorias();

    foreach ($categorias as $categoria):?>
    <li><span><a href="<?=BASE_URL?>producto/obtenerProductosPorId/?idCategoria=<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></span></a><span><a href="<?=BASE_URL?>categoria/editarCategoria/?idCategoria=<?= $categoria->getId() ?>">Editar</a><a class="rojo" href="<?= BASE_URL ?>categoria/eliminarCategoriaPorId/?idCategoria=<?= $categoria->getId() ?>">Eliminar</a></span></li>
    <?php endforeach;
    endif;?>

</ul>
</div>
