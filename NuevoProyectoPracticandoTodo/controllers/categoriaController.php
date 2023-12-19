<?php
namespace controllers;
use lib\Pages,
    models\categoria,
    service\categoriaService;
use utils\utils;
use utils\ValidationUtils;

class categoriaController{
    private categoriaService $categoriaService;
    private Pages $pages;
    public function __construct()
    {
        $this->categoriaService=new categoriaService();
        $this->pages=new Pages();
    }

    public static function obtenerCategorias(){
        $categoriaService=new categoriaService();
        $categorias=$categoriaService->getAll();
        return categoria::fromArray($categorias);

    }



    public function gestionarCategorias(){
        $this->pages->render('categoria/mostrarGestionCategorias',['categorias'=>categoriaController::obtenerCategorias()]);
    }

    public function eliminarCategoriaPorId(){
        $idCategoria=$_GET['idCategoria'];
        $idCategoria=ValidationUtils::SVNumero($idCategoria);
        if(!isset($idCategoria)){
            $this->pages->render('categoria/mostrarGestionCategorias',['error'=>'Ha que ha ocurrido un error inesperado']);
            exit();
        }
        $this->categoriaService->borrarCategoriaPorId($_GET['idCategoria']);
        header('Location:'.BASE_URL.'categoria/gestionarCategorias/');
    }

    public function editarCategoria(){
        if(!isset($_POST['nuevoNombre'])){
            if (isset($_GET['idCategoria'])){
                $id=$_GET['idCategoria'];
                $id=ValidationUtils::SVNumero($id);
                if (isset($id)){
                    $resultado=$this->categoriaService->obtenerCategoriaPorID($id);
                    if(is_string($resultado)){
                        $this->pages->render('categoria/mostrarGestionCategorias',['error'=>$resultado]);
                        exit();
                    }
                    $resultado=categoria::fromArray([$resultado]);
                    $this->pages->render('categoria/editarCategoria',['categoriaEdit'=>$resultado]);
                    exit();
                }
            }
            $this->pages->render('categoria/mostrarGestionCategorias',['error'=>'Ha que ha ocurrido un error inesperado']);
        }else{
            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['nuevoNombre'])){
                $id=ValidationUtils::SVNumero($_GET['idCategoria']);
                if (!isset($id)){
                    $this->pages->render('categoria/mostrarGestionCategorias',['error'=>'Ha que ha ocurrido un error inesperado']);
                    exit();
                }
                $nuevoNombre=ValidationUtils::sanidarStringFiltro($_POST['nuevoNombre']);
                if (!ValidationUtils::noEstaVacio($nuevoNombre)){
                    $error='El nombre no puede estar vacío';
                }elseif (!ValidationUtils::son_letras($nuevoNombre)){
                    $error='El nombre solo puede contener letras';
                }elseif(!ValidationUtils::TextoNoEsMayorQue($nuevoNombre,50)){
                    $error='El nombre no puede tener más de 50 caracteres';
                }
                if (isset($error)){
                    $oldCategoria=$this->categoriaService->obtenerCategoriaPorID($id);
                    if(is_string($oldCategoria)){
                        $this->pages->render('categoria/mostrarGestionCategorias',['error'=>$oldCategoria]);
                        exit();
                    }
                    $oldCategoria=categoria::fromArray([$oldCategoria]);
                    $this->pages->render('categoria/editarCategoria',['error'=>$error,'categoriaEdit'=>$oldCategoria]);
                    exit();
                }
                $categoriaEditada=new categoria($id,$nuevoNombre);
                $error=$this->categoriaService->update($categoriaEditada);
                if($error){
                    $this->pages->render('categoria/mostrarGestionCategorias',['errores'=>$error]);
                }else{
                        $this->pages->render('categoria/mostrarGestionCategorias',['exito'=>'Categoria editada correctamente']);
                }
            }
        }
    }
}
