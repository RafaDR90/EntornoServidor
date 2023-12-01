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


    public static function getAll():?array
    {
        $categoria = new Categoria();
        $categoria->db->consulta("SELECT * FROM categorias ORDER BY id DESC");
        $categorias = $categoria->db->extraer_todos();
        $categoria->db->cierraConexion();
        return $categorias;
    }
}