<?php
namespace Animales;

class Animal{
    private $tipo;
    private $color;
    public function __construct()
    {
        $this->tipo = "Terrestre";
        $this->color = "Verde";
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getColor(){
        return $this->color;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setColor($color){
        $this->color = $color;
    }
}
