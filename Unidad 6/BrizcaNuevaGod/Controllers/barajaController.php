<?php
namespace Controllers;

use Models\Baraja;

class barajaController{
    public function mostrarBaraja(){
        $barajaa=new Baraja();
        require_once "./Views/baraja/muestraBaraja.php";
    }
}