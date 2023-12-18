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
}
