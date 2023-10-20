<?php
class Coche{
    private $color;
    private $marca;
    private $modelo;
    private $velocidad;
    private $caballos;
    private $numDePlazas;

    /**
     * @param $color
     * @param $marca
     * @param $modelo
     * @param $velocidad
     * @param $caballos
     * @param $numDePlazas
     */
    public function __construct(
        string $color = "Rojo",
        string $marca = "Ferrari",
        string $modelo = "Aventador",
        int $velocidad = 300,
        int $caballos = 500,
        int $numDePlazas = 2
    ) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballos = $caballos;
        $this->numDePlazas = $numDePlazas;
    }
    public function frenar ():void{
        $this->velocidad-=1;
        if ($this->velocidad<0){
            $this->velocidad=0;
        }
    }

    public function acelerar ():void{
        $this->velocidad+=1;
        if ($this->velocidad>400){
            $this->velocidad=300;
        }
    }


    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getVelocidad(): string
    {
        return $this->velocidad;
    }

    public function setVelocidad(string $velocidad): void
    {
        $this->velocidad = $velocidad;
    }

    public function getCaballos(): string
    {
        return $this->caballos;
    }

    public function setCaballos(string $caballos): void
    {
        $this->caballos = $caballos;
    }

    public function getNumDePlazas(): string
    {
        return $this->numDePlazas;
    }

    public function setNumDePlazas(string $numDePlazas): void
    {
        $this->numDePlazas = $numDePlazas;
    }
}