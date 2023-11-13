<?php
namespace Lib;
use Mysqli;

class DataBase{
    private Mysqli $conexion;

    public function __construct(
        private string $servidor,
        private string $usuario,
        private string $password,
        private string $baseDatos)
    {
        $this->conexion = $this->conectar();
    }

    private function coenctar():Mysqli{
        $conexion=new Mysqli($this->servidor, $this->usuario, $this->password, $this->baseDatos);
        if ($conexion->connect_error) {
            die ("Error en conexión base datos: " . $conexion->connect_error);
        }
        return $conexion;
    }
}