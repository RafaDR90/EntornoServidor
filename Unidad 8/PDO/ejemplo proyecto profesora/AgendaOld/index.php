<?php
require_once "AutoLoad.php";
require_once './config/config.php';


use Lib\Router;
use src\Lib\Pages;

$pages = new Pages();
$pages->render('/layout/Header');

Router::add('GET','/', function (){
    return "Bienvenido";
});

//Router::add('GET','/Paciente/mostrarTodos', function (){
//    return (new PacienteController())->mostrarTodos();
//});
//Router::add('GET','/Doctor/listar', function (){
//    return (new DoctorController())->listar();
//});
//Router::add('GET','/Doctor/registro', function (){
 //   return (new DoctorController())->registro();
//});


Router::dispatch();

?>

    <nav>
        <ul>
            <li><a href="<?=BASE_URL?>">Inicio</a></li>
            <li><a href="<?=BASE_URL?>/Paciente/mostrarTodos">Mostrar todos mis pacientes</a></li>
            <li><a href="<?=BASE_URL?>/Doctor/listar">Listado de médicos</a></li>
            <li><a href="<?=BASE_URL?>/Doctor/registro">Registrar un nuevo médico</a></li>

        </ul>
    </nav>


<?php

$pages->render('/footer');

