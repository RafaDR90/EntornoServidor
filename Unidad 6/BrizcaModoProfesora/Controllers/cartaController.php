<?php
namespace Controllers;
use Models\carta,
    Libreria\Pages;

class cartaController{
    private Pages $page;

    public function __construct()
    {
        $this->page=new Pages();
    }

    public function chooseCard(){
        $this->page->render('carta/chooseCard');
    }

    public function showCard(){
        $this->page->render('carta/showCard');
    }

}