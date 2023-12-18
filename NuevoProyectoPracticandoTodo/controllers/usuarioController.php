<?php
namespace controllers;
use lib\Pages,
    models\usuario;
use service\usuarioService;
use utils\utils;

class usuarioController{
    private usuarioService $usuarioService;
    private Pages $pages;

    public function __construct()
    {
        $this->usuarioService=new usuarioService();
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

                $registrado['password']=password_hash($registrado['password'],PASSWORD_BCRYPT,['cost'=>4]);

                $usuario=usuario::fromArray($registrado);
                $error=$usuario->validaUsuario();
                if($error){
                    $this->pages->render('usuario/registro', ['error' => $error]);
                }
                $save=$this->usuarioService->createUser($usuario);
                if (!$save) {
                    $error = 'No se ha podido registrar el usuario1';
                }else{
                    $exito='Usuario registrado correctamente';
                }
            }else{
                $error='No se ha podido registrar el usuario2';
            }
        }
        $this->pages->render('usuario/registro', ['error' => isset($error) ? $error : null, 'exito' => isset($exito) ? $exito : null]);
    }
    public function logout(){
        utils::deleteSession('identity');
        header("Location: " . BASE_URL);
    }

}