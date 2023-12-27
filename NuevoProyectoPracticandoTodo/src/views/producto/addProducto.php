<div class="addProductoFormContainer">
    <h3>Añadir un Nuevo Producto</h3>
    <form action="<?=BASE_URL?>add-producto" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="producto[nombre]" required><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="producto[descripcion]" required></textarea><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="producto[precio]" step="0.01" required><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="producto[stock]" required><br>

        <label for="imagen">Imagen:</label><br>
        <input type="file" id="imagen" name="producto[imagen]" accept="image/*" required><br>

        <input type="submit" name="submit" value="Añadir Producto">
    </form>
</div>