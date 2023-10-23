<?php
namespace PanelAdministrador;

class Usuario{
    private $nombre;
    private $email;
    public function __construct(){
        $this->nombre="Antonio pineda";
        $this->email="antonio@antonio.com";
}
    public function getNombre(){
        return $this->nombre;
    }

    public function infomacion(){
        echo __NAMESPACE__;
    }
}