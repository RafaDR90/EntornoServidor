<?php
namespace controllers;
use lib\Pages,
    models\usuario;
use utils\utils;

class usuarioController{
    private Pages $pages;

    public function __construct()
    {
        $this->pages=new Pages();
    }

    public function indetifica(){
        $this->pages->render("usuario/login");
    }
    public function login(){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            if ($_POST['data']){
                $login=$_POST['data'];

                $usuario=usuario::fromArray($login);
                $identity=$usuario->login();

                if($identity && is_object($identity)){
                    $_SESSION['identity']=$identity;
                    if ($identity->rol == 'admin'){
                        $_SESSION['admin']=true;
                    }
                }
            }
        }else{
            $_SESSION['error_login']='identificacion fallida';
        }
        $usuario->desconecta();

        header("Location: " . BASE_URL);
    }
    public function registro(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if ($_POST['data']){
                $registrado=$_POST['data'];

                //sanear y validar con metodos estaticos

                $registrado['password']=password_hash($registrado['password'],PASSWORD_BCRYPT,['cost'=>4]);

                //tambien se puede validar en la funcion fromArray
                $usuario=usuario::fromArray($registrado);

                $save=$usuario->save();
                if ($save){
                    $_SESSION['register']='complete';
                }else {
                    $_SESSION['register'] = 'failed';
                }
            }else{
                $_SESSION['register'] = 'failed';
            }
            $usuario->desconecta();
        }
        $this->pages->render('usuario/registro');
    }
    public function logout(){
        utils::deleteSession('identity');
        header("Location: " . BASE_URL);
    }

}