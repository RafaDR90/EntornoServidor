<?php
namespace repository;
use lib\BaseDeDatos,
    PDO,
    PDOException;
class usuarioRepository{
    public function __construct()
    {
        $this->db=new BaseDeDatos();
    }
    public function createUser($usuario){
        $id=null;
        $nombre=$usuario->getNombre();
        $apellidos=$usuario->getApellidos();
        $email=$usuario->getEmail();
        $password=$usuario->getPassword();
        $rol='user';
        try{
            $ins=$this->db->prepara("INSERT INTO usuarios (id,nombre,apellidos,email,password,rol) values (:id,:nombre,:apellidos,:email,:password,:rol)");
            $ins->bindValue(':id',$id);
            $ins->bindValue(':nombre',$nombre);
            $ins->bindValue(':apellidos',$apellidos);
            $ins->bindValue(':email',$email);
            $ins->bindValue(':password',$password);
            $ins->bindValue(':rol',$rol);
            $ins->execute();
            $result=true;
        }catch (PDOException $err){
            $result=false;
        }
        return $result;
    }
}
