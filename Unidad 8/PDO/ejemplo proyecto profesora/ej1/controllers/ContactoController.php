<?php
namespace controllers;

use models\Contacto_Ne_pp;
use services\ContactoService;
use src\Lib\Pages;

class ContactoController{

    private array $errores=[];
    private ContactoService $service;
    private Pages $pages;
    public function __construct()
    {
        $this->service= new ContactoService();
        $this->pages=new Pages();
    }

    public function listar():void{
        $contactos=$this->service->findAll();
        $this->pages->render("viewContactos",["resultado"=>$contactos]);
    }

    public function add(){

    }
}
