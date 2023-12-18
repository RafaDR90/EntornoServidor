<?php
namespace controllers;
use lib\Pages,
    models\producto,
    service\productoService;
use utils\utils;

class productoController{
    private Pages $pages;
    private productoService $productoService;
    public function __construct()
    {
        $this->pages=new Pages();
        $this->productoService=new productoService();
    }

    public function obtenerProductosPorId(){
        $productos= $this->productoService->getProductoById($_GET['idCategoria']);
        if (is_string($productos)) {
            $this->pages->render('producto/gestionProductos', ['error' => $productos]);
        } else {
            if(isset($_GET['productoAñadido'])) {
                $this->pages->render('producto/gestionProductos', ['productos' => producto::fromArray($productos), 'productoAñadido' => $_GET['productoAñadido']]);
            }else{
                $this->pages->render('producto/gestionProductos', ['productos' => producto::fromArray($productos)]);
            }
        }
    }

}