<?php use controllers\categoriaController; ?>
<ul>
    <?php if (isset($_SESSION['identity'])&& $_SESSION['identity']->rol=='admin'): ?>
    <?php $categorias= categoriaController::obtenerCategorias();

    foreach ($categorias as $categoria):?>
    <li><span><?= $categoria->getNombre() ?></span><span><a href="<?=BASE_URL?>categoria/editarCategoria/?idCategoria=<?= $categoria->getId() ?>">Editar</a><a href="<?= BASE_URL ?>categoria/eliminarCategoriaPorId/?idCategoria=<?= $categoria->getId() ?>">Eliminar</a></span></li>
    <?php endforeach;
    endif;?>

</ul>
