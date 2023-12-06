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
        if(!isset($_POST['nombre'])){
            if (isset($_GET['idCategoria'])){
                $categoria=new categoria();
                $resultado=$categoria->obtenerCategoriaPorID($_GET['idCategoria']);
                $this->pages->render('categoria/editarCategoria',['categoriaEdit'=>$resultado]);
            }else{

                header('Location:'.BASE_URL.'categoria/gestionarCategorias/');
            }
        }else{
            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['nombre'])){
                $categoria=new categoria();
                $categoriaEditada=new categoria($_GET['idCategoria'],$_POST['nombre']);
                $errores=$categoria->update($categoriaEditada);
                if($errores){
                    $this->pages->render('categoria/gestionarCategorias',['errores'=>$errores]);
                }else{
                    header('Location:'.BASE_URL.'categoria/gestionarCategorias/');
                }
            }
        }
    }
}
