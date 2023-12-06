<?php
namespace models;
use lib\BaseDeDatos,
    PDO;

class categoria{
    private ?int $id;
    private string $nombre;
    private BaseDeDatos $db;
    private mixed $sql;

    public function __construct(?int $id=null, string $nombre='')
    {
        $this->id=$id;
        $this->nombre=$nombre;
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

    public static function fromArray(array $data):array
    {
        $categorias=[];
        foreach ($data as $dt) {
            $categoria = new categoria(
                $dt['id'] ?? null,
                $dt['nombre'] ?? '',
            );
            $categorias[]=$categoria;
        }
        return $categorias;
    }
    public function borrarCategoriaPorId(int $id):?string{
        $categoria = new Categoria();
        $resultado='';
        try{
            $this->sql=$categoria->db->prepara("DELETE FROM categorias WHERE id = :id");
            $this->sql->bindValue(':id',$id);
            $this->sql->execute();
            $resultado=null;
        }catch (PDOException $e){
            $resultado=$e->getMessage();
        }
        $this->sql->closeCursor();
        $this->sql=null;
        $categoria->db->cierraConexion();
        return $resultado;
    }

    public function obtenerCategoriaPorID($id){
        $this->sql=$this->db->prepara("SELECT * FROM categorias WHERE id = :id");
        $this->sql->bindValue(':id',$id);
        $this->sql->execute();
        $resultado=$this->sql->fetch(PDO::FETCH_ASSOC);
        $this->sql->closeCursor();
        $this->sql=null;
        $this->db->cierraConexion();
        return $resultado;
    }
    public function update($datos){
        $resultado='';
        try{
            $this->sql=$this->db->prepara("UPDATE categorias SET nombre = :nombre WHERE id = :id");
            $this->sql->bindValue(':id',$datos->getId());
            $this->sql->bindValue(':nombre',$datos->getNombre());
            $this->sql->execute();
            $resultado=null;
        }catch (PDOException $e){
            $resultado=$e->getMessage();
        }
        $this->sql->closeCursor();
        $this->sql=null;
        $this->db->cierraConexion();
        return $resultado;
    }

}