<?php
require_once "AutoLoad.php";
use Models\Carta,
    Models\Baraja,
    Controllers\barajaController;

//$baraja1=new \Models\Baraja();
//var_dump($baraja1);

$controlador=new barajaController();
$controlador->mostrarBaraja();

if (isset($_GET['controller'])){
    $nombreControlador="Controllers\\".$_GET['controller']."Controller";
}