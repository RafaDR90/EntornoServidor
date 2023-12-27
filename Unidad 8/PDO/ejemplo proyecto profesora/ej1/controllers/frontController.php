<?php
namespace Controllers;

class frontController{
    public static function main(){
            if (isset($_GET["controller"])){
                $nombre_controlador="controllers\\".$_GET["controller"]."Controller";
            }else{
                $nombre_controlador= "controllers\\".CONTROLLER_DEFAULT;
            }
            if (class_exists($nombre_controlador)){
                $controlador=new $nombre_controlador();
                if (isset($_GET["action"])&& method_exists($controlador,$_GET["action"])){
                    $action=$_GET["action"];
                    $controlador->$action();
                }elseif(!isset($_GET["controller"])&& !isset($_GET["action"])){
                    $action_default=ACTION_DEFAULT;
                    $controlador->$action_default();
                }else{
                    echo errorController::show_error404()."1";
                }
            }else{
                echo errorController::show_error404()."2";
            }

    }
}

    ?>
