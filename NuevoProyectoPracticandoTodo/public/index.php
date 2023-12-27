<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/config.php";
require_once './router.php';
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__.'/..'); //para acceder al archivo .env
$dotenv->safeLoad();
const PATH="/EntornoServidor/NuevoProyectoPracticandoTodo/public";

use controllers\FrontController;
use controllers\usuarioController;
use controllers\categoriaController;
use controllers\productoController;

// CREO CONTROLADORES
$productoController=new productoController();
$usuarioController=new usuarioController();
$categoriaController=new categoriaController();

// PAGINA PRINCIPAL
get(PATH, function () use ($productoController){
    $productoController->showIndex();
});
// CREAR CUENTA
get(PATH.'/CreateAccount', function () use ($usuarioController){
    $usuarioController->registro();
});
post(PATH.'/CreateAccount', function () use ($usuarioController){
    $usuarioController->registro();
});
// LOGIN
get(PATH.'/Login', function () use ($usuarioController){
    $usuarioController->login();
});
post(PATH.'/Login', function () use ($usuarioController){
    $usuarioController->login();
});
get(PATH.'/CierraSesion', function () use ($usuarioController){
    $usuarioController->logout();
});

//                                                    CATEGORIAS
// GESTIONAR CATEGORIAS
get(PATH.'/gestionarCategorias', function () use ($categoriaController){
    $categoriaController->gestionarCategorias();
});
get(PATH.'/gestionarCategorias/$page', function ($page) use ($categoriaController){
    $categoriaController->gestionarCategorias($page);
});

// EDITAR CATEGORIA
get(PATH.'/editarCategoria/$id', function ($id) use ($categoriaController){
    $categoriaController->editarCategoria($id);
});
post(PATH.'/editarCategoria/$id', function ($id) use ($categoriaController){
    $categoriaController->editarCategoria($id);
});
get(PATH.'/eliminarCategoria/$id', function ($id) use ($categoriaController){
    $categoriaController->eliminarCategoriaPorId($id);
});

post(PATH.'/NuevaCategoria', function () use ($categoriaController){
    $categoriaController->crearCategoria();
});
get(PATH.'/obtenerProductosPorId/$id', function ($id) use ($productoController){
    $productoController->obtenerProductosPorId($id);
});

//                                                      PRODUCTOS

// GESTIONAR PRODUCTOS
get(PATH.'/gestion-productos',function () use ($productoController){
    $productoController->muestraGestionProductos();
});
post(PATH.'/gestion-productos',function () use ($productoController){
    $productoController->muestraGestionProductos();
});
// AÑADIR PRODUCTO
get(PATH.'/add-producto', function () use ($productoController){
    $productoController->addProducto();
});
post(PATH.'/add-producto', function () use ($productoController){
    $productoController->addProducto();
});
// ELIMINAR PRODUCTO
get(PATH.'/eliminar-producto/$id', function ($id) use ($productoController){
    $productoController->eliminarProducto($id);
});
get(PATH.'/editar-producto/$id', function ($id) use ($productoController){
    $productoController->editarProducto($id);
});
post(PATH.'/editar-producto', function () use ($productoController){
    $productoController->confirmaEdicion($_POST['id'],$_POST["edit"]);
});

// LA PAGINA NO SE ENCUENTRA
any('/404', function (){
    $productoController=new productoController();
    $productoController->showIndex();
});
?>
