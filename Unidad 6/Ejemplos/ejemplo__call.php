<?php
namespace Unidad6\Ejemplos\ejemplo__call;
class Persona{

public function __construct (private $nombre, private $edad, private $ciudad){
}

public function __call($name, $arguments)
{
    $prefijo_metodo=substr($name,0,3);

    if($prefijo_metodo=="get"){
        $nombre_propiedad=substr(strtolower($name),3);

        if(!isset($this->$nombre_propiedad)){
            return "No existe la propiedad $nombre_propiedad";
        }
        return $this->$nombre_propiedad."<br>";
}else{
    return "No existe el metodo $name";}
}
}
$persona=new Persona("rafael", 20, "Granada");
echo "Nombre: ".$persona->getNombre();