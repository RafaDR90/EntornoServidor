<?php
spl_autoload_register(function ($className) {
    $classDirectory=str_replace("\\","/",$className);
    if (file_exists($classDirectory.".php")){
        require_once $classDirectory.".php";
    }
});
