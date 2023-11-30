<?php
namespace models;
use lib\BaseDeDatos,
    PDO;

class categoria{
    private $id;
    private $nombre;
    private BaseDeDatos $db;

    public function __construct()
    {
        $this->db=new BaseDeDatos();
    }

    public static function extraerRegistros (){

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDb(): BaseDeDatos
    {
        return $this->db;
    }

    public function setDb(BaseDeDatos $db): void
    {
        $this->db = $db;
    }


}