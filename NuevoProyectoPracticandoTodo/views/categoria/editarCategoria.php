<?php if (!isset($_GET['idCategoria'])) {
    header('Location: ' . BASE_URL . 'categoria/gestionarCategorias/');
}
?>
<h3>Editar categoria</h3>
<form action="<?= BASE_URL ?>categoria/editarCategoria/?idCategoria=<?= $_GET['idCategoria'] ?>" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?= $categoriaEdit['nombre'] ?>">
</form>
<?php unset($categoriaEdit);