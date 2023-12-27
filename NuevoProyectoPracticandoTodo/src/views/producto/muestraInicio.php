<?php
use controllers\productoController;
$productos=productoController::muestraDiezProductosRandom();
?>
<div class="productosContainer">
<?php
    foreach ($productos as $producto):
        $oferta=null;
        if($producto->getOferta()){
            $oferta='Oferta';
        }?>
    <div class="productoCard<?=$oferta?>">
        <?php if ($producto->getOferta()):?>
        <h3>¡Oferta!</h3>
        <?php endif;?>
        <p class="nombre__Producto"><?=$producto->getNombre()?></p>
        <p class="descripcion__Producto"<?=$producto->getDescripcion()?>></p>
        <div class="imgContainer">
            <img src="../../img/productos/<?=$producto->getImagen()?>" alt="Imagen del producto">
        </div>
        <p class="precio__Producto"><?=$producto->getPrecio()?>€</p>
        <p class="stock__Producto"><?=$producto->getStock()?> unidades disponibles</p>
        <a class="botonAddCesta" href="<?=BASE_URL?>carrito/añadirProducto/<?=$producto->getId()?>">Añadir a la cesta</a>
    </div>
<?php endforeach;
if (isset($_SESSION['productosCarrito']))

?>
</div>