<?php
namespace controllers;
use models\producto;
use src\Lib\Pages;

class carritoController
{
    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function añadirProducto()
    {
        if (isset($_GET['idProducto'])) {
            $idProducto = $_GET['idProducto'];
            if (!session_status() == PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (!isset($_SESSION['productosCarrito'])) {
                $_SESSION['productosCarrito'] = array();
            }
            if (!isset($_SESSION['productosCarrito'][$idProducto])) {
                $_SESSION['productosCarrito'][$idProducto] = 1;
            } else {
                $_SESSION['productosCarrito'][$idProducto]++;
            }
        }
        header('Location:' . BASE_URL . 'producto/obtenerProductosPorId/?idCategoria=' . $_GET['idCategoria'] . '&productoAñadido=true');
    }

    public function mostrarCarrito()
    {
        $producto=new producto();
        $productos=$producto->getProductoByIdProducto();
        $this->pages->render('carrito/muestraGestionCarrito',['productos'=>$productos]);
    }
}
//añadir productos, eliminar productos, vaciar carrito, incrementar unidades, decrementarunidades