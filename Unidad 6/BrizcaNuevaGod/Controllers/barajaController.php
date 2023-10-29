<?php
namespace Controllers;

use Models\Baraja;

class barajaController{
    public function mostrarBaraja(){
        $baraja=new Baraja();
        require_once "./Views/baraja/muestraBaraja.php";
    }

    public function barajar(){
        $baraja=new Baraja();
        $baraja->barajar($baraja);
        require_once "./Views/baraja/muestraBaraja.php";
    }
}