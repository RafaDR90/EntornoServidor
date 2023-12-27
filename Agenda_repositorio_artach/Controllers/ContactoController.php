<?php

namespace Controllers;

use Model\Contacto;
use services\ContactoService;
use src\Lib\Pages;

class ContactoController{
    private Contacto $contact;
    private Pages $pages;
    private ContactoService $service;

    function __construct(){
        $this->contact=new Contacto();
        $this->pages=new Pages();
        $this->service=new ContactoService();
    }
    public  function listar(): void{
        $contactos= $this->service->findAll();
        $this->pages->render('contacto/showContacto',['contactos'=>$contactos]);
    }

    public function borrar(){
        die( "Contacto:".$_GET['id']);
    }

    public function editar(){

        $contacto=$this->service->read($_GET['id']);
        $this->pages->render('contacto/formContacto',['contacto'=>$contacto]);
    }

    public function nuevoContacto(){
        $this->pages->render('contacto/formContacto');
    }
}