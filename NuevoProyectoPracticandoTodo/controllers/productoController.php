<?php
namespace controllers;
use lib\Pages,
    models\producto;
use utils\utils;

class productoController{
    public function __construct()
    {
        $this->pages=new Pages();
    }

    public function obtenerProductosPorId(){
        $producto=new producto();
        $productos= $producto->getProductoById($_GET['idCategoria']);
        if (isset($productos['error'])) {
            $this->pages->render('producto/gestionProductos', ['error' => $productos['error']]);
        } else {
            if(isset($_GET['productoAñadido'])) {
                $this->pages->render('producto/gestionProductos', ['productos' => producto::fromArray($productos), 'productoAñadido' => $_GET['productoAñadido']]);
            }else{
                $this->pages->render('producto/gestionProductos', ['productos' => producto::fromArray($productos)]);
            }
        }
    }

}