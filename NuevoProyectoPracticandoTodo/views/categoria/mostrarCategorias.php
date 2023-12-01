<?php use controllers\categoriaController; ?>
<ul>
    <?php if (isset($_SESSION['identity'])&& $_SESSION['identity']=='admin'): ?>
    <?php $categorias= categoriaController::obtenerCategorias();
    foreach ($categorias as $categoria): ?>
    <li><?php echo $categoria ?></li>
    <?php endforeach;
    endif;?>

</ul>
