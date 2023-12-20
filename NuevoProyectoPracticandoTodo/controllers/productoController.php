<?php
namespace controllers;
use lib\Pages,
    models\producto,
    service\productoService,
    controllers\categoriaController;
use utils\utils;
use utils\ValidationUtils;

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
            $this->pages->render('producto/muestraProductos', ['error' => $productos]);
        } else {
            if(isset($_GET['productoAñadido'])) {
                $this->pages->render('producto/muestraProductos', ['productos' => producto::fromArray($productos), 'productoAñadido' => $_GET['productoAñadido']]);
            }else{
                $this->pages->render('producto/muestraProductos', ['productos' => producto::fromArray($productos)]);
            }
        }
    }

    public function muestraProductosPorCategoria()
    {
        if (isset($_SESSION['identity'])){
            if ($_SESSION['identity']['rol']=='admin'){
                if ($_SERVER['REQUEST_METHOD']!='POST'){
                    $this->pages->render('producto/gestionProductos', ['categorias' => categoriaController::obtenerCategorias()]);
                    exit();
                }else{
                    $id=ValidationUtils::SVNumero($_POST['categoria']);
                    if (!isset($id)){
                        $this->pages->render('producto/gestionProductos', ['categorias' => categoriaController::obtenerCategorias(),'error'=>'Ha ocurrido un error inesperado']);
                        exit();
                    }
                    $productos=$this->productoService->getProductoById($id);
                    if (is_string($productos)){
                        $this->pages->render('producto/gestionProductos', ['categorias' => categoriaController::obtenerCategorias(),'error'=>$productos]);
                        exit();
                    }else{
                        $this->pages->render('producto/gestionProductos', ['categorias' => categoriaController::obtenerCategorias(),'productos'=>producto::fromArray($productos)]);
                        exit();
                    }
                }

            }
        }
        //TIENE QUE HACER UN HEADER A LA PAGINA DE INICIO (aun no tengo pagina de inicio)____________________________________________________________________________________
    }
}