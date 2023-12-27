<?php
namespace controllers;

use models\Contacto_e_Np;
use src\Lib\Pages;

class ContactoController{

    private array $errores=[];
    private Contacto_e_Np $contacto;
    private Pages $pages;
    public function __construct()
    {
        $this->contacto= new Contacto_e_Np();
        $this->pages=new Pages();
    }

    public function showAll(){
        $resulado= $this->contacto->extractAll();
        $this->pages->render("viewController",["resultado"=>$resulado]);
    }
}
