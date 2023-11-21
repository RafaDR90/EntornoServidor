<?php
namespace repositories;
use lib\BaseDatos_Ne_p,
    models\Contacto_Ne_p,
    PDO,
    PDOException;

class ContactoRepository{
    private BaseDatos_Ne_p $conexion;

    function __construct()
    {
        $this->conexion=new BaseDatos_Ne_p();
    }
    public function findAll():?array{
        $this->conexion->consulta("SELECT * FROM contactos");
        return $this->extractAll();
    }

    public function extractAll():?array{
        $contactos=[];
        $contactosData=$this->conexion->extraer_todos();
        foreach($contactosData as $contactoData){
            $contactos[]=Contacto_Ne_p::fromArray($contactoData);
        }
        return $contactos;
    }

    public function extraer_registro():?Contacto_Ne_p{
        return ($contacto=$this->conexion->extraer_registro())?Contacto_Ne_p::fromArray($contacto):null;
    }

    public function read(int $id):?Contacto_Ne_p{
        $consulta="SELECT id, nombre, apellidos FROM contactos WHERE id=:id";
        $stmt=$this->conexion->prepara($consulta);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt=null;
        return $this->extraer_registro();
    }

    public function filasAfectadas():int{
        return $this->conexion->filasAfectadas();
    }
}