<?php
namespace service;
use repository\productoRepository;
class productoService{
    private $productoRepository;
    public function __construct()
    {
        $this->productoRepository=new productoRepository();
    }

    public function getProductoById(int $id){
        return $this->productoRepository->getProductoById($id);
    }

    public function getDiezProductosRandom(){
        return $this->productoRepository->getDiezProductosRandom();
    }

    public function addProducto($producto){
        return $this->productoRepository->addProducto($producto);
    }

    public function eliminarProducto($id){
        return $this->productoRepository->eliminarProducto($id);
    }
    public function obtenerNombreImagen($id){
        return $this->productoRepository->obtenerNombreImagen($id);
    }

    public function getProductoByIdProducto($id){
        return $this->productoRepository->getProductoByIdProducto($id);
    }
    public function editarProducto($id,$producto){
        return $this->productoRepository->editarProducto($id,$producto);
    }

    public function editarImagenProducto($id,$imagen){
        return $this->productoRepository->editarImagenProducto($id,$imagen);
    }
}