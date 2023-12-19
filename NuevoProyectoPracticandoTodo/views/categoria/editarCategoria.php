<?php if (!isset($_GET['idCategoria'])) {
    header('Location: ' . BASE_URL . 'categoria/gestionarCategorias/');
}
?>
<div class="editaCategoriaContainer">
<h3>Editar categoria</h3>
<form action="<?= BASE_URL ?>categoria/editarCategoria/?idCategoria=<?= $_GET['idCategoria'] ?>" method="POST">
    <label for="nuevoNombre">Nuevo nombre</label>
    <input type="text" name="nuevoNombre" id="nuevoNombre" value="<?= $categoriaEdit[0]->getNombre() ?>">
    <input type="submit" value="Editar">
</form>
</div>
<?php unset($categoriaEdit);