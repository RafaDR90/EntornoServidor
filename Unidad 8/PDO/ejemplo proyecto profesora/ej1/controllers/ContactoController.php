<?php
namespace controllers;

use services\ContactoService;
use models\Contacto_Ne_pp;
use lib\Pages;

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
