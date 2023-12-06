<?php if(isset($_GET['productoAñadido'])):?>
    <h3>Producto añadido al carrito</h3>
<?php endif;
?>
<ul>
    <?php if (isset($_SESSION['identity'])):
    foreach ($productos as $producto):?>
    <li><span><?=$producto->getNombre()?></span><span><a href="<?=BASE_URL?>carrito/añadirProducto/?idProducto=<?=$producto->getId()?>&idCategoria=<?=$_GET['idCategoria']?>">Comprar</a></span></li>

<?php endforeach;
endif;
if (isset($_SESSION['productosCarrito']))
var_dump($_SESSION['productosCarrito']);
?>
</ul>
