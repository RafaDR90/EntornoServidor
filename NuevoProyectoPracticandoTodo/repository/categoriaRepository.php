<?php
namespace repository;
use lib\BaseDeDatos,
    PDO,
    PDOException;
class categoriaRepository{
    private $db;
    public function __construct()
    {
        $this->db=new BaseDeDatos();
    }

    public function getAll():array
    {
        try{
            $sel=$this->db->prepara("SELECT * FROM categorias ORDER BY id DESC");
            $sel->execute();
            $categorias=$sel->fetchAll(PDO::FETCH_ASSOC);
        }catch (\PDOException $e){
            $categorias=['error'=>$e->getMessage()];
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
            return $categorias;
        }
    }
    /**
     * Elimina una categoría y todos los productos asociados a ella.
     *
     * @param int $id El ID de la categoría a eliminar.
     * @return string|null Devuelve null si la operación es exitosa, o un mensaje de error en caso de excepción.
     */
    public function borrarCategoriaPorId(int $id):?string{
        try {
            //elimina antes los productos de dicha categoria
            $this->db->beginTransaction();
            $deleteProductos = $this->db->prepara("DELETE FROM productos WHERE categoria_id = :id");
            $deleteProductos->bindValue(':id', $id);
            $deleteProductos->execute();
            //elimina la categoria
            $deleteCategoria = $this->db->prepara("DELETE FROM categorias WHERE id = :id");
            $deleteCategoria->bindValue(':id', $id);
            $deleteCategoria->execute();
            $this->db->commit();
            $resultado = null;
        }catch (PDOException $e){
            $this->db->rollBack();
            $resultado=$e->getMessage();
        } finally {
            if (isset($deleteProductos)) {
                $deleteProductos->closeCursor();
            }
            if (isset($deleteCategoria)) {
                $deleteCategoria->closeCursor();
            }
            $this->db->cierraConexion();
            return $resultado;
        }

    }
}
