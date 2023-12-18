<?php
namespace repository;
use lib\BaseDeDatos,
    PDO,
    PDOException;
class productoRepository{
    private $db;
    public function __construct()
    {
        $this->db=new BaseDeDatos();
    }
    public function getProductoById(int $id)
    {
        try{
            $sel=$this->db->prepara("SELECT * FROM productos WHERE categoria_id=:id");
            $sel->bindParam(':id',$id,PDO::PARAM_INT);
            $sel->execute();
            $resultado=$sel->fetchAll(PDO::FETCH_ASSOC);

        }catch (\PDOException $e){
            $resultado=$e->getMessage();
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
            return $resultado;
        }
    }
}