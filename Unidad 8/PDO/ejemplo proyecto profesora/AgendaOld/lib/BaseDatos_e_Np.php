<?php
namespace lib;
use PDO;

require_once "config/config.php";
class BaseDatos_e_Np extends PDO{
    private PDO $bd;
    private mixed $result;
    public function __construct(
        private $tipo_de_base='mysql',
        PRIVATE STRING $SERVIDOR=SERVIDOR,
        private string $usuario=USUARIO,
        private string $pw=PW,
        private string $base_datos=BASE_DATOS){
        try{
            $opciones=array(
                PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
                PDO::MYSQL_ATTR_FOUND_ROWS=>true,);
            parent::__construct("{$this->tipo_de_base}:dbname={$this->base_datos};host={$this->SERVIDOR}",
                $this->usuario,$this->pw,$opciones);
        }catch (PDOException $e){
            die("Ha surgido un error y no se puede conectar a la base de datos. Detalle: ".$e->getMessage());
        }
    }

    public function prepara($consultaSQL){
        $this->result=$this->prepare($consultaSQL);
        $this->result->execute();
        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResult(): mixed
    {
        return $this->result;
    }

    public function setResult(mixed $result): void
    {
        $this->result = $result;
    }

    public function getBd(): PDO
    {
        return $this->bd;
    }

    public function setBd(PDO $bd): void
    {
        $this->bd = $bd;
    }




}