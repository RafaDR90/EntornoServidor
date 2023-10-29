<?php
require_once "AutoLoad.php";
use Models\Carta,
    Models\Baraja,
    Controllers\barajaController,
    Controllers\indexController;


//$baraja1=new \Models\Baraja();
//var_dump($baraja1);
$barajarController=new barajaController();
if (!isset($_GET["action"])){
    $indexController= new indexController;
    $indexController->showIndex();
}

//$controlador->mostrarBaraja();

if (isset($_GET['action']) and $_GET['action']=="mostrarBaraja"){
    $barajarController->mostrarBaraja();
}

if (isset($_GET['action']) and $_GET['action']=="barajar"){
    $barajarController->barajar();
}