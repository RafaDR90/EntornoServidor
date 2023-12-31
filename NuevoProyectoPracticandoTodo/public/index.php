<?php
session_start();

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/config.php";
require_once './router.php';
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__.'/..'); //para acceder al archivo .env
$dotenv->safeLoad();

// Obtiene las rutas de la aplicación
require_once __DIR__."/routes.php";
