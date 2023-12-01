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
        return categoria::getAll();

    }

    public function mostrarCategorias(){
        $this->pages->render('categoria/gestionaCategorias');
    }
}
