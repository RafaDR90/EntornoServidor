<?php

namespace Models;
//crear clase carta con constructor, comprobar palo estatico, comprobar numero estatico.
class carta{
    const PALOS = ["Oros","Copas","Espadas","Bastos"];
    const NUMEROS = array(1=>"AS",2=>"DOS",3=>"TRES",
        4=>"CUATRO",5=>"CINCO",6=>"SEIS",7=>"SIETE",
        8=>"OCHO",9=>"NUEVE",10=>"SOTA",11=>"CABALLO",
        12=>"REY");

    public function __construct(private int $numero,
                                private string $palo){}

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getPalo(): string
    {
        return strtolower($this->palo);
    }


    public function setPalo(string $palo): void
    {
        $this->palo = $palo;
    }

    public function getNumeroString():string{
        return self::NUMEROS[$this->getNumero()];
    }




    public static function comprobarPalo(string $palo):bool{
        $paloUpper=strtoupper($palo);
        return in_array($paloUpper, self::PALOS);
    }

    public static function comprobarNumero(int $numero):bool{
        return array_key_exists($numero, self::NUMEROS);
    }

    public function __toString():string{
        if(self::comprobarPalo($this->getPalo()) && self::comprobarNumero($this->getNumero())){
        return $this->getNumeroString() . " de " . $this->getPalo();
        }else{
            return "Carta no valida";
        }
    }
}


