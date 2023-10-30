<?php
require_once "AutoLoad.php";
use Controllers\barajaController,
    Controllers\indexController;


$barajarController=new barajaController();
if (!empty($_GET)){
    if (isset($_GET['action']) and $_GET['action']=="mostrarBaraja"){
        $barajarController->mostrarBaraja();
    }

    if (isset($_GET['action']) and $_GET['action']=="barajar"){
        $barajarController->barajar();
    }
}else{
    $indexController= new indexController;
    $indexController->showIndex();
}





