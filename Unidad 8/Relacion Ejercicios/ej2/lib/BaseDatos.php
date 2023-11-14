<?php
namespace lib;
use PDO;

require_once "Config/config.php";
class BaseDatos extends PDO{
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
                PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8_unicode_ci",
                PDO::MYSQL_ATTR_FOUND_ROWS=>true,);
            parent::__construct("{$this->tipo_de_base}:dbname={$this->base_datos};host={$this->SERVIDOR}",
                $this->usuario,$this->pw,$opciones);
        }catch (PDOException $e){
            die("Ha surgido un error y no se puede conectar a la base de datos. Detalle: ".$e->getMessage());
        }
    }
}