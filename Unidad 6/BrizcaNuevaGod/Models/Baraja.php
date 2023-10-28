<?php
//crear clase baraja, constructor con todas las cartas, metodo barajar.
namespace Models;

class Baraja{

    public function __construct(){
        $baraja=[];
        $palos=Carta::PALOS;
        for ($i=0;$i<sizeof($palos);$i++){
            for ($j=1;$j<=12;$j++){
                $carta=new Carta($j,$palos[$i]);
                $baraja[]=$carta; //Esto es igual que hacer array_push()
            }
        }
        $this->baraja=$baraja;
    }

    public function getBaraja(): array
    {
        return $this->baraja;
    }

    public function setBaraja(array $baraja): void
    {
        $this->baraja = $baraja;
    }

    public function barajar($baraja){
        return shuffle($baraja);
    }
}
