<div class="productosContainer">
<?php
    foreach ($productos as $producto):
        $oferta=null;
        if($producto->getOferta()=='si'){
            $oferta='Oferta';
        }?>
    <div class="productoCard<?=$oferta?>">
        <?php if (isset($oferta)):?>
        <h3>¡Oferta!</h3>
        <?php endif;?>
        <p class="nombre__Producto"><?=$producto->getNombre()?></p>
        <p class="descripcion__Producto"<?=$producto->getDescripcion()?>></p>
        <div class="imgContainer">
            <img src="../../img/productos/<?=$producto->getImagen()?>" alt="Imagen del producto">
        </div>
        <p class="precio__Producto"><?=$producto->getPrecio()?>€</p>
        <p class="stock__Producto"><?=$producto->getStock()?> unidades disponibles</p>
        <a class="botonAddCesta" href="<?=BASE_URL?>carrito/añadirProducto/?idProducto=<?=$producto->getId()?>&idCategoria=<?=$_GET['idCategoria']?>">Añadir a la cesta</a>
        <?php if(isset($_SESSION['identity'])):
                if($_SESSION['identity']['rol']=='admin'):?>
        <div class="editarEliminarContainer"><a class="boton" href="">Editar producto</a><a class="boton" href="">Eliminar producto</a></div>
        <?php endif;
        endif;?>
    </div>
<?php endforeach;
if (isset($_SESSION['productosCarrito']))

?>
</div>
