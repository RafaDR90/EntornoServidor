<div class="gestionaProductosContainer">
    <div class="formSeleccionCategoria">
        <label for="categoria">Selecciona una categoria</label>
        <div class="select-submit-container">
        <form action="<?=BASE_URL?>producto/muestraProductosPorCategoria/" method="POST">
            <select name="categoria" id="categoria">
<?php
foreach ($categorias as $categoria):?>
            <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
<?php endforeach;?>
            </select>
            <input type="submit" value="Ver productos">
        </form>
        </div>
    </div>
<?php
if (isset($productos)):?>
    <div class="modificaProductosContainer">
        <?php foreach ($productos as $producto):?>
        <div class="cardModificaProducto">
            <div class="columnaDatos"><span class="modifyProductId">Producto ID: <?=$producto->getId()?>&nbsp;&nbsp;</span><div class="imgModifyProduct__container"><img src="../../img/productos/<?=$producto->getImagen()?>"></div><p class="modifyProductNombre"><?=$producto->getNombre()?></p></div><div class="columnaButtons"><a href="">Editar</a><a href="">Eliminar</a> </div>
        </div>
        <?php endforeach;?>
    </div>

<?php endif;?>
</div>
