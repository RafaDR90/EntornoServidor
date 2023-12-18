<?php
namespace service;
use repository\usuarioRepository;
class usuarioService{
    private usuarioRepository $usuarioRepository;
    public function __construct()
    {
        $this->usuarioRepository=new usuarioRepository();
    }
    public function createUser($usuario){
        return $this->usuarioRepository->createUser($usuario);
    }
    public function compruebaCorreo($email){
        return $this->usuarioRepository->compruebaCorreo($email);
    }
    public function getUsuarioFromEmail($email){
        return $this->usuarioRepository->getUsuarioFromEmail($email);
    }
    public function cierraConexion(){
        $this->usuarioRepository->cierraConexion();
    }
}
