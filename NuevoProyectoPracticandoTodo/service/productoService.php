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
}