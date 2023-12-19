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

    public function indentifica(){
        $this->pages->render("usuario/login");
    }
    public function login(){
        if (isset($_SESSION['identity'])){
           header("Location: " . BASE_URL);
           exit();
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            if ($_POST['data']){
                $login=$_POST['data'];

                $usuario=usuario::fromArray($login);
                $error=$usuario->saneaYValidaUsuario();
                if($error){
                    $this->pages->render('usuario/login', ['error' => $error]);
                    exit();
                }
                $existeEmail=$this->usuarioService->compruebaCorreo($usuario->getEmail());
                if (is_string($existeEmail)){
                    $this->usuarioService->cierraConexion();
                    $this->pages->render('usuario/login', ['error' => 'Parece que ha habido algun problema con el correo, por favor contacte con el soporte tecnico']);
                    exit();
                }elseif (!$existeEmail){
                    $this->usuarioService->cierraConexion();
                    $this->pages->render('usuario/login', ['error' => 'El correo no existe']);
                    exit();
                }
                $usuarioFromEmail=$this->usuarioService->getUsuarioFromEmail($usuario->getEmail());
                if (!$usuarioFromEmail){
                    $this->pages->render('usuario/login', ['error' => 'Parece que ha habido algun problema con el correo, por favor contacte con el soporte tecnico']);
                    exit();
                }elseif(is_string($usuarioFromEmail)){
                    $this->pages->render('usuario/login', ['error' => $usuarioFromEmail]);
                    exit();
                }
                if($usuario->comprobarPassword($usuarioFromEmail['password'])){
                    $_SESSION['identity']=$usuarioFromEmail;
                    $nombre=ucfirst(strtolower($_SESSION['identity']['nombre']));
                    $this->pages->render('categoria/mostrarGestionCategorias', ['exito' => 'Bienvenido '.$nombre]);
                }else{
                    $this->pages->render('usuario/login', ['error' => 'Email o contraseña incorrectos']);
                    exit();
                }
            }
        }
            $this->pages->render('usuario/login', ['error' => 'Parece que ha habido algun problema al indenticficarte, si el problema continua, contacte con soporte tecnico']);
    }
    public function registro(){
        if (isset($_SESSION['identity'])){
            header("Location: " . BASE_URL);
            exit();
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if ($_POST['data']){
                $registrado=$_POST['data'];

                $usuario=usuario::fromArray($registrado);
                $error=$usuario->saneaYValidaUsuario();
                if($error){
                    $this->pages->render('usuario/registro', ['error' => $error]);
                    exit();
                }
                $usuario->setPassword(password_hash($usuario->getPassword(),PASSWORD_BCRYPT,['cost'=>4]));

                $correoUsado=$this->usuarioService->compruebaCorreo($usuario->getEmail());
                if (is_string($correoUsado)){
                    $error='Parece que ha habido algun problema con el correo, por favor contacte con el soporte tecnico';
                    $this->pages->render('usuario/registro', ['error' => $error]);
                    exit();
                }
                if ($correoUsado){
                    $error='El correo ya esta en uso';
                    $this->pages->render('usuario/registro', ['error' => $error]);
                    exit();
                }
                $save=$this->usuarioService->createUser($usuario);
                if (!$save) {
                    $error = 'No se ha podido registrar el usuario';
                }else{
                    $exito='Usuario registrado correctamente';
                }
            }else{
                $error='No se ha podido registrar el usuario';
            }
        }
        $this->pages->render('usuario/registro', ['error' => isset($error) ? $error : null, 'exito' => isset($exito) ? $exito : null]);
    }
    public function logout(){
        if (!isset($_SESSION['identity'])){
            header("Location: " . BASE_URL);
            exit();
        }
        utils::deleteSession('identity');
        header("Location: " . BASE_URL);
    }

}