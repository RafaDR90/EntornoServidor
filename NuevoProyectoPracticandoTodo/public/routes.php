<?php
const PATH="/EntornoServidor/NuevoProyectoPracticandoTodo/public";

use controllers\usuarioController;
use controllers\categoriaController;
use controllers\productoController;
use controllers\carritoController;


// CREO CONTROLADORES
$productoController=new productoController();
$usuarioController=new usuarioController();
$categoriaController=new categoriaController();
$carritoController=new carritoController();

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
// EDITAR PRODUCTO
get(PATH.'/editar-producto/$id', function ($id) use ($productoController){
$productoController->editarProducto($id);
});
post(PATH.'/editar-producto', function () use ($productoController){
$productoController->confirmaEdicion($_POST['id'],$_POST["edit"]);
});

// VER PRODUCTOS
get(PATH.'/productos/$id', function ($id) use ($productoController){
$productoController->obtenerProductosPorId($id);
});

// AÑADIR PRODUCTO A LA CESTA
get(PATH.'/AddCesta/$id', function ($id) use ($carritoController){
$carritoController->addProducto($id);
});
// VER CARRITO
get(PATH.'/mostrarCarrito', function () use ($carritoController){
$carritoController->mostrarCarrito();
});

// RESTAR PRODUCTO
get(PATH.'/restar-producto/$id', function ($id) use ($carritoController){
$carritoController->restarProducto($id);
});
// AUMENTAR PRODUCTO
get(PATH.'/aumentar-producto/$id', function ($id) use ($carritoController){
$carritoController->aumentarProducto($id);
});
// ELIMINAR PRODUCTO
get(PATH.'/eliminarProducto/$id', function ($id) use ($carritoController){
$carritoController->eliminarProducto($id);
});
// VACIAR CARRITO
get(PATH.'/vaciar-carrito', function () use ($carritoController){
$carritoController->vaciarCarrito();
});
// COMPRAR
get(PATH.'/comprar', function () use ($carritoController){
$carritoController->comprar();
});
//                                               USUARIOS
// GESTIONAR USUARIOS
get(PATH.'/gestion-usuarios', function () use ($usuarioController){
$usuarioController->muestraGestionUsuarios();
});
post(PATH.'/rolUsuarios', function () use ($usuarioController){
$usuarioController->muestraGestionUsuarios($_POST['tipoUsuario']);
});
// CAMBIAR ROL
post(PATH.'/cambiarRol', function () use ($usuarioController){
$usuarioController->cambiarRol($_POST['id'],$_POST['rol'],$_POST['nombre']);
});


// LA PAGINA NO SE ENCUENTRA
any('/404', function (){
$productoController=new productoController();
$productoController->showIndex();
});
?>