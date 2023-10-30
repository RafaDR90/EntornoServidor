<?php
namespace Controllers;

class errorController{
    public static function show_error404(){
        return "<p>La pagina que buscas no existe</p>";
    }
}