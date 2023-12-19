<?php
require_once "AutoLoad.php";
require_once "Config/config.php";
use lib\Router;
use Controllers\frontController;
frontController::main();
?>