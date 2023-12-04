<?php
namespace controllers;
use lib\Pages,
    models\categoria;
use utils\utils;

class categoriaController{
    public function __construct()
    {
        $this->pages=new Pages();
    }

    public static function obtenerCategorias(){
        $categorias= categoria::getAll();
        return categoria::fromArray($categorias);

    }



    public function gestionarCategorias(){
        $this->pages->render('categoria/mostrarGestionCategorias',['categorias'=>categoriaController::obtenerCategorias()]);
    }

    public function eliminarCategoriaPorId(){
        $categoria=new categoria();
        $categoria->borrarCategoriaPorId($_GET['idCategoria']);
        header('Location:'.BASE_URL.'categoria/gestionarCategorias/');
    }

    public function editarCategoria(){
        if(!isset($_POST['datos'])){
            if (isset($_GET['idCategoria'])){
                $categoria=new categoria();
                $resultado=$categoria->obtenerCategoriaPorID($_GET['idCategoria']);
                var_dump($resultado);die();
            }else{
                header('Location:'.BASE_URL.'categoria/gestionarCategorias/');
            }
        }else{

        }
    }
}
