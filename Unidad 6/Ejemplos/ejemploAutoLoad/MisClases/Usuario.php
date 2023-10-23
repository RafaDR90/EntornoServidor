<?php
namespace MisClases;

class Usuario{
    private $nombre;
    private $email;
    public function __construct(){
        $this->nombre="Ana Garcia";
        $this->email="ana@ana.com";
    }
    public function getNombre(){
        return $this->nombre;
    }
}