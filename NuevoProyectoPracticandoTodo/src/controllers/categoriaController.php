<?php
namespace controllers;
use models\categoria;
use service\categoriaService;
use lib\Pages;
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



    public function gestionarCategorias($page=null){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        $this->pages->render('categoria/mostrarGestionCategorias',['categorias'=>categoriaController::obtenerCategorias(),'page'=>$page]);
    }

    public function eliminarCategoriaPorId($id){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        if(!isset($id)){
            $this->pages->render('categoria/mostrarGestionCategorias',['error'=>'Ha que ha ocurrido un error inesperado']);
            exit();
        }
        $idCategoria=ValidationUtils::SVNumero($id);
        $error=$this->categoriaService->borrarCategoriaPorId($idCategoria);
        if ($error){
            $this->pages->render('categoria/mostrarGestionCategorias',['error'=>$error]);
            exit();
        }
        $this->pages->render('categoria/mostrarGestionCategorias',['exito'=>'Categoria eliminada correctamente']);
    }

    public function editarCategoria($id){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        if(!isset($_POST['nuevoNombre'])){
            if (isset($id)){
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
                $id=ValidationUtils::SVNumero($id);
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
                    $this->pages->render('categoria/mostrarGestionCategorias',['error'=>$error]);
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

    public function crearCategoria(){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin') {
            $this->pages->render('producto/muestraInicio', ['error' => 'No tienes permisos para acceder a esta página']);
            exit();
        }
        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['nuevaCategoria'])){
            $nuevaCategoria=ValidationUtils::sanidarStringFiltro($_POST['nuevaCategoria']);
            if (!ValidationUtils::noEstaVacio($nuevaCategoria)){
                $error='El nombre no puede estar vacío';
            }elseif (!ValidationUtils::son_letras($nuevaCategoria)){
                $error='El nombre solo puede contener letras';
            }elseif(!ValidationUtils::TextoNoEsMayorQue($nuevaCategoria,50)){
                $error='El nombre no puede tener más de 50 caracteres';
            }
            if (isset($error)){
                $this->pages->render('categoria/mostrarGestionCategorias',['error'=>$error]);
                exit();
            }
            $categoria=new categoria(null,$nuevaCategoria);
            $error=$this->categoriaService->create($categoria);
            if($error){
                $this->pages->render('categoria/mostrarGestionCategorias',['error'=>"error"]);
            }else{
                $this->pages->render('categoria/mostrarGestionCategorias',['exito'=>'Categoria creada correctamente']);
            }
        }
    }
}
