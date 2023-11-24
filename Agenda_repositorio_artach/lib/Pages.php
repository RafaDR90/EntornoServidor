<?php

namespace lib;

class Pages{
    /*
     * Este metodo te crea tantas variables como le pases en un array y te carga las vistas de header y footer,
     * y entre ellas la vista que le indicaste.
     */
    public function render(string $pageName, array $params = null):void{
        if ($params !=null){
            foreach ($params as $name =>$value){
                $$name=$value;
            }
        }
        require_once "views/layout/header.php";
        require_once "views/$pageName.php";
        require_once "views/layout/footer.php";
    }
}