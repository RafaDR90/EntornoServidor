<?php
namespace Controllers;

use Models\Baraja,
    Libreria\Pages;

class barajaController{
    private Baraja $baraja;
    private Pages $pages;

    public function __construct()
    {
        $this->baraja=new Baraja();
        $this->pages=new Pages();
    }

    public function mostrarBaraja(Baraja $mazo=null){
        if ($mazo==null){
            $mazo=$this->baraja;
        }
        $this->pages->render('baraja/muestraBaraja',['mazo'=>$mazo->getBaraja()]);
    }

    public function barajar(){
        $baraja=$this->baraja;
        $barajaBarajada=$baraja->getBaraja();
        shuffle($barajaBarajada);
        $baraja->setBaraja($barajaBarajada);
        $this->mostrarBaraja($baraja);
    }

}