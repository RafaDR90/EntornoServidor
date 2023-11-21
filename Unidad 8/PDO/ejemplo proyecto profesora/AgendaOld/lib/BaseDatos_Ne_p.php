<?php

namespace lib;

use PDO;
use PDOException;

require_once "config/config.php";

class BaseDatos_Ne_p
{
    private PDO $conexion;
    private mixed $resultado;

    private string $servidor = SERVIDOR;
    private string $usuario = USUARIO;
    private string $pass = PW;
    private string $base_datos = BASE_DATOS;

    function __construct()
    {
        $this->conexion = $this->conectar();
    }

    private function conectar(): PDO
    {
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            );
            $conexion = new PDO("mysql:host={$this->servidor};dbname={$this->base_datos}", $this->usuario, $this->pass, $opciones);

            return $conexion;
        } catch (PDOException $e) {
            echo "Ha surgido un error y no se puede conectar a la base de datos. Detalle: " . $e->getMessage();
            exit();
        }
    }

    public function consulta(string $consultaSQL): void
    {
        $this->resultado = $this->conexion->query($consultaSQL);
    }

    public function extraer_registro(): mixed
    {
        return ($fila = $this->resultado->fetch(PDO::FETCH_ASSOC)) ? $fila : false;
    }

    public function extraer_todos(): array
    {
        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filasAfectadas()
    {
        return $this->resultado->rowCount();
    }

    public function insertarContacto(Contacto $contacto): void
    {
        $nombre = $contacto->getNombre();
        $apellidos = $contacto->getApellidos();
        $correo = $contacto->getCorreo();
        $direccion = $contacto->getDireccion();
        $telefono = $contacto->getTelefono();
        $fechaNacimiento = $contacto->getFechaNacimiento();

        try {
            $consultaSQL = "INSERT INTO tabla_contactos (nombre, apellidos, correo, direccion, telefono, fecha_nacimiento) VALUES (:nombre, :apellidos, :correo, :direccion, :telefono, :fecha_nacimiento)";
            $stmt = $this->conexion->prepare($consultaSQL);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar contacto. Detalle: " . $e->getMessage();
        }
    }

}
