<div class="editProductoFormContainer">
    <h3>Editar Producto</h3>
    <form action="<?=BASE_URL?>editar-producto" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$producto->getId();?>">

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="edit" name="edit[nombre]" value="<?= $producto->getNombre(); ?>"><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="edit[descripcion]"><?= $producto->getDescripcion(); ?></textarea><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="edit[precio]" step="0.01" value="<?= $producto->getPrecio(); ?>"><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="edit[stock]" value="<?= $producto->getStock(); ?>"><br>

        <label for="oferta">Oferta:</label><br>
        <select id="oferta" name="edit[oferta]">
            <option value=1 <?=$producto->getOferta() == true ? 'selected' : ''; ?>>Sí</option>
            <option value=0 <?=$producto->getOferta() == false ? 'selected' : ''; ?>>No</option>
        </select><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" id="fecha" name="edit[fecha]" value="<?=$producto->getFecha(); ?>"><br>

        <label for="imagen">Imagen:</label><br>
        <input type="file" id="imagen" name="edit[imagen]"><br>
        <small>Imagen actual: <?=$producto->getImagen(); ?></small><br>

        <input type="submit" value="Actualizar Producto">
    </form>
</div>
