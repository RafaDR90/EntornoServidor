<?php
namespace controllers;
use models\categoria;
use models\producto;
use service\categoriaService;
use service\productoService;
use lib\Pages;
use utils\ValidationUtils;

class productoController{
    private Pages $pages;
    private productoService $productoService;
    public function __construct()
    {
        $this->pages=new Pages();
        $this->productoService=new productoService();
    }

    public function showIndex(){
        $this->pages->render('producto/muestraInicio');
    }

    /**
     * Renderiza la pagina de gestion de productos, si viene por post, muestra los productos de la categoria seleccionada,
     * si no viene por post, pero existe la session editandoProducto, muestra los productos de la categoria de la session,
     * de lo contrario, muestra la pagina de gestion de productos sin productos hasta que seleccione una categoria.
     * @return void
     */
    public function muestraGestionProductos(){
        if (!isset($_SESSION['identity'])){
            if ($_SESSION['identity']['rol']=='admin'){
                $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
                exit();
            }
            $this->pages->render('producto/muestraInicio',['error'=>'Debes identificarte como administrador para poder administrar productos']);
            exit();
        }
        if ($_SERVER['REQUEST_METHOD']!='POST' && !isset($_SESSION['editandoProducto'])){
            $this->pages->render('producto/gestionProductos');
            exit();
        }else {
            if (isset($_POST['categoriaId'])){
                if ($_POST['categoriaId']=='NA'){
                    $this->pages->render('producto/gestionProductos',['error'=>'Selecciona una categoria']);
                    exit();
                }
                $id=ValidationUtils::SVNumero($_POST['categoriaId']);
                if (!isset($id)){
                    $this->pages->render('producto/gestionProductos',['error'=>'Ha ocurrido un error inesperado']);
                    exit();
                }
                $_SESSION['editandoProducto']=$id;
                $productos=$this->productoService->getProductoById($id);
                if (is_string($productos)){
                    $this->pages->render('producto/gestionProductos',['error'=>$productos]);
                    exit();
                }
            }elseif(isset($_SESSION['editandoProducto'])){
                $productos=$this->productoService->getProductoById($_SESSION['editandoProducto']);
                if (is_string($productos)){
                    $this->pages->render('producto/gestionProductos',['error'=>$productos]);
                    exit();
                }
            }
            $productos=producto::fromArray($productos);
            $this->pages->render('producto/gestionProductos', ['productos' => $productos]);
        }
    }

    public function obtenerProductosPorId($id){
        if (!isset($id)){
            $this->pages->render('producto/muestraInicio',['error'=>'Ha ocurrido un error inesperado']);
            exit();
        }
        $id=ValidationUtils::SVNumero($id);
        if (!is_integer($id)){
            $this->pages->render('producto/muestraInicio',['error'=>'Ha ocurrido un error inesperado']);
            exit();
        }
        $productos= $this->productoService->getProductoById($id);
        if (is_string($productos)) {
            $this->pages->render('producto/muestraProductos', ['error' => $productos]);
        } else {
                $this->pages->render('producto/muestraProductos', ['productos' => producto::fromArray($productos)]);
        }
    }

    public static function muestraDiezProductosRandom(){
        $productoService=new productoService();
        $productos=$productoService->getDiezProductosRandom();
        return producto::fromArray($productos);
    }

    /**
     * Muestra la pagina de gestion de productos, si viene por post, muestra los productos de la categoria seleccionada,
     * si no viene por post, pero existe la session editandoProducto, muestra los productos de la categoria de la session,
     * de lo contrario, muestra la pagina de gestion de productos sin productos hasta que seleccione una categoria.
     * @return void
     */
    public function muestraProductosPorCategoria():void
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
        $this->pages->render('producto/muestraInicio',['error'=>'Debes identificarte como administrador para poder administrar productos']);
    }

    public function addProducto(){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        if ($_SERVER['REQUEST_METHOD']!='POST'){
            $this->pages->render('producto/addProducto');
        }else{
            $directorioImg="./../src/img/productos/";
            if (!is_dir($directorioImg)){
                mkdir($directorioImg, 0777, true);
            }
            $categoriaService=new categoriaService();
            $datosCategoria=$categoriaService->obtenerCategoriaPorID($_SESSION['editandoProducto']);
            if (is_string($datosCategoria)){
                $this->pages->render('producto/addProducto',['error'=>$datosCategoria]);
                exit();
            }
            $nombreImagen = $datosCategoria["nombre"]."_".$_FILES['producto']['name']['imagen'];
            $rutaConImagen=$directorioImg . basename($nombreImagen);
            $tipoImagen = strtolower(pathinfo($rutaConImagen,PATHINFO_EXTENSION));

            //validacion imagen
            if(isset($_POST["submit"])){
                $check = getimagesize($_FILES["producto"]["tmp_name"]['imagen']);
                if($check == false) {
                    $this->pages->render('producto/addProducto',['error'=>'El archivo no es una imagen']);
                    exit();
                }
            }
            //Verifica si el archivo existe
            if (file_exists($rutaConImagen)) {
                $this->pages->render('producto/addProducto',['error'=>'El nombre de la imagen ya existe']);
                exit();
            }

            //Verifica el tamaño del archivo
            if ($_FILES["producto"]["size"]['imagen'] > 500000) {
                $this->pages->render('producto/addProducto',['error'=>'El tamaño de la imagen es demasiado grande']);
                exit();
            }

            //Formatos permitidos
            if($tipoImagen != "jpg" && $tipoImagen != "png" && $tipoImagen != "jpeg") {
                $this->pages->render('producto/addProducto',['error'=>'Solo se permiten archivos JPG, JPEG y PNG']);
                exit();
            }

            //Valida los datos $_POST que no son imagen
            $productoModel=new producto();
            $datos=$productoModel->saneaYvalidaProducto($_POST['producto']);
            if (is_string($datos)){
                $this->pages->render('producto/addProducto',['error'=>$datos]);
                exit();
            }
            $productoModel->setNombre($datos['nombre']);
            $productoModel->setDescripcion($datos['descripcion']);
            $productoModel->setPrecio($datos['precio']);
            $productoModel->setStock($datos['stock']);
            $productoModel->setCategoriaId($_SESSION['editandoProducto']);
            $productoModel->setOferta("no");
            $productoModel->setFecha(date('Y-m-d'));
            $productoModel->setImagen($nombreImagen);

            //Sube el archivo y en caso de exito, añade el producto a la base de datos
            if (move_uploaded_file($_FILES["producto"]["tmp_name"]['imagen'], $rutaConImagen)) {

                $error=$this->productoService->addProducto($productoModel);
                if (isset($error)){
                    //borra la imagen si ha ocurrido un error
                    unlink($rutaConImagen);
                    $this->pages->render('producto/addProducto',['error'=>$error]);
                    exit();
                }
                $this->pages->render('producto/gestionProductos',['exito'=>'Producto añadido correctamente']);
                exit();
            } else {
                $this->pages->render('producto/addProducto',['error'=>'Ha ocurrido un error inesperado']);
                exit();
            }
        }
    }

    public function eliminarProducto($id){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        if(isset($id)){
            $id=ValidationUtils::SVNumero($id);
        }
        //no se usa else porque al validar el id, si no es un numero, devuelve null
        if($id==null){
            $this->pages->render('producto/muestraInicio',['error'=>'Ha ocurrido un error inesperado']);
            exit();
        }
        $productoAEliminar=$this->productoService->obtenerNombreImagen($id);
        if (is_string($productoAEliminar)){
            $this->pages->render('producto/gestionProductos',['error'=>"No se encuentra el producto a eliminar"]);
            exit();
        }
        $error=$this->productoService->eliminarProducto($id);
        if (isset($error)){
            $this->pages->render('producto/gestionProductos',['error'=>$error]);
            exit();
        }
        if (file_exists("./../src/img/productos/".$productoAEliminar['imagen'])){
            unlink("./../src/img/productos/".$productoAEliminar['imagen']);
        }
        $this->pages->render('producto/gestionProductos',['exito'=>'Producto eliminado correctamente']);
    }

    public function editarProducto($id){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        if(isset($id)){
            $id=ValidationUtils::SVNumero($id);
        }
        //no se usa else porque al validar el id, si no es un numero, devuelve null
        if($id==null){
            $this->pages->render('producto/muestraInicio',['error'=>'Ha ocurrido un error inesperado']);
            exit();
        }
        $producto=$this->productoService->getProductoByIdProducto($id);
        if (is_string($producto)){
            $this->pages->render('producto/gestionProductos',['error'=>"No se encuentra el producto a editar"]);
            exit();
        }
        $producto=producto::fromArray([$producto]);
        $this->pages->render('producto/editarProducto',['producto'=>$producto[0]]);
    }

    public function confirmaEdicion($id,$edit){
        if (!isset($_SESSION['identity'])|| $_SESSION['identity']['rol']!='admin'){
            $this->pages->render('producto/muestraInicio',['error'=>'No tienes permisos para acceder a esta página']);
            exit();
        }
        $id=ValidationUtils::SVNumero($id);
        if (!isset($id)){
            $this->pages->render('producto/gestionProductos',['error'=>'Ha ocurrido un error inesperado']);
            exit();
        }
        $oldProducto=$this->productoService->getProductoByIdProducto($id);
        if (is_string($oldProducto)){
            $this->pages->render('producto/gestionProductos',['error'=>$oldProducto]);
            exit();
        }
        $oldProducto=producto::fromArray([$oldProducto]);
        /*Comprueba si se ha cambiado algun campo, si no se ha cambiado ninguno, no hace nada, si se ha cambiado alguno
          crea un array con los campos que se han cambiado.*/
        if($oldProducto[0]->getNombre()!=$edit['nombre']){
            $nuevoProducto=[];
            $nuevoProducto['nombre']=$edit['nombre'];
        }
        if ($oldProducto[0]->getDescripcion()!=$edit['descripcion']){
            if (!isset($nuevoProducto))
                $nuevoProducto=[];
            $nuevoProducto['descripcion']=$edit['descripcion'];
        }
        if ($oldProducto[0]->getPrecio()!=$edit['precio']){
            if (!isset($nuevoProducto))
                $nuevoProducto=[];
            $nuevoProducto['precio']=$edit['precio'];
        }
        if ($oldProducto[0]->getStock()!=$edit['stock']){
            if (!isset($nuevoProducto))
                $nuevoProducto=[];
            $nuevoProducto['stock']=$edit['stock'];
        }
        if ($oldProducto[0]->getOferta()!=(bool)$edit['oferta']){
            if (!isset($nuevoProducto))
                $nuevoProducto=[];
            $nuevoProducto['oferta']=(bool)$edit['oferta'];
        }
        if ($oldProducto[0]->getFecha()!=$edit['fecha']){
            if (!isset($nuevoProducto))
                $nuevoProducto=[];
            $nuevoProducto['fecha']=$edit['fecha'];
        }
        /* En caso de que el se haya cambiado algun campo, se comprueba que los campos que no se han cambiado no esten
           vacios, si estan vacios, se les asigna el valor que tenian antes de validar el producto */
        if (isset($nuevoProducto)) {
            if (!isset($nuevoProducto['nombre'])) {
                $nuevoProducto['nombre'] = $oldProducto[0]->getNombre();
            }
            if (!isset($nuevoProducto['descripcion'])) {
                $nuevoProducto['descripcion'] = $oldProducto[0]->getDescripcion();
            }
            if (!isset($nuevoProducto['precio'])) {
                $nuevoProducto['precio'] = $oldProducto[0]->getPrecio();
            }
            if (!isset($nuevoProducto['stock'])) {
                $nuevoProducto['stock'] = $oldProducto[0]->getStock();
            }
            if (!isset($nuevoProducto['oferta'])) {
                $nuevoProducto['oferta'] = $oldProducto[0]->getOferta();
            }
            if (!isset($nuevoProducto['fecha'])) {
                $nuevoProducto['fecha'] = $oldProducto[0]->getFecha();
            }
            $productoModel = new producto();

            $nuevoProducto = $productoModel->saneaYvalidaProductoCompleto($nuevoProducto);
            if (is_string($nuevoProducto)) {
                $this->pages->render('producto/gestionProductos', ['error' => $nuevoProducto]);
                exit();
            }
        }
        //HASTA AQUI TENGO $NUEVOPRODUCTO SANEADO Y VALIDADO
        //Comprueba si se ha cambiado la imagen
        if (isset($_FILES['edit']['name']['imagen']) && $_FILES['edit']['error']['imagen'] == 0){
            $directorioImg="./../src/img/productos/";
            if (!is_dir($directorioImg)){
                mkdir($directorioImg, 0777, true);
            }
            $categoriaService=new categoriaService();
            $datosCategoria=$categoriaService->obtenerCategoriaPorID($_SESSION['editandoProducto']);
            $nombreImagen = $datosCategoria["nombre"]."_".$_FILES['edit']['name']['imagen'];
            $rutaConImagen=$directorioImg . basename($nombreImagen);
            $tipoImagen = strtolower(pathinfo($rutaConImagen,PATHINFO_EXTENSION));

            //validacion imagen
            if(isset($_POST["submit"])){
                $check = getimagesize($_FILES["edit"]["tmp_name"]['imagen']);
                if($check == false) {
                    $this->pages->render('producto/gestionProductos',['error'=>'El archivo no es una imagen']);
                    exit();
                }
            }

            //Verifica si el archivo existe
            if (file_exists($rutaConImagen)) {
                $this->pages->render('producto/gestionProductos',['error'=>'El nombre de la imagen ya existe']);
                exit();
            }

            //Verifica el tamaño del archivo
            if ($_FILES["edit"]["size"]['imagen'] > 500000) {
                $this->pages->render('producto/gestionProductos',['error'=>'El tamaño de la imagen es demasiado grande']);
                exit();
            }

            //Formatos permitidos
            if($tipoImagen != "jpg" && $tipoImagen != "png" && $tipoImagen != "jpeg") {
                $this->pages->render('producto/gestionProductos',['error'=>'Solo se permiten archivos JPG, JPEG y PNG']);
                exit();
            }
            //en caso de exito continua con la edicion, de lo contrario, muestra un error
            if(move_uploaded_file($_FILES["edit"]["tmp_name"]['imagen'], $rutaConImagen)){
                if(file_exists("./../src/img/productos/".$oldProducto[0]->getImagen())){
                    unlink("./../src/img/productos/".$oldProducto[0]->getImagen());
                }
                $nuevaImagen=$nombreImagen;
            }else{
                $this->pages->render('producto/gestionProductos',['error'=>'Ha ocurrido un error inesperado']);
                exit();
            }
        }
        if (!isset($nuevaImagen)&&!isset($nuevoProducto)){
            $this->pages->render('producto/gestionProductos',['error'=>'No se ha cambiado ningún campo']);
            exit();
        }else{
            if (isset($nuevoProducto)&&isset($nuevaImagen)){
                $nuevoProducto['imagen']=$nuevaImagen;
                $error=$this->productoService->editarProducto($id,$nuevoProducto);
            }elseif(isset($nuevoProducto)){
                $nuevoProducto['imagen']=$oldProducto[0]->getImagen();
                $error=$this->productoService->editarProducto($id,$nuevoProducto);
            }elseif(isset($nuevaImagen)){
                $error=$this->productoService->editarImagenProducto($id,$nuevaImagen);
            }
            if (isset($error)) {
                $this->pages->render('producto/gestionProductos', ['error' => $error]);
                exit();
            }
            $this->pages->render('producto/gestionProductos',['exito'=>'Producto editado con exito']);
        }
    }
}