<?php
namespace models;
use lib\BaseDatos_e_Np,
    PDO,
    PDOException;

class Contacto_e_Np{
    private BaseDatos_e_Np $conexion;
    private mixed $stmt;

    function __construct(
        private string|null $id=null,
        private string $nombre='',
        private string $apellidos='',
        private string $correo='',
        private string $direccion='',
        private string $telefono='',
        private string $fecha_nacimiento='',
    )
    {
        $this->conexion=new BaseDatos_e_Np();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getFechaNacimiento(): string
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(string $fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function insert(): string|int {
        try {
            //puedo cambiar prepare por prepara y crear la funcion en la clase base de datos
            $this->sentencia = $this->conexion->prepara("INSERT INTO contactos(id,nombre,apellidos,correo,telefono,fecha_nacimiento)
            values (:id,:nombre,:apellidos,:correo,:direccion,:telefono,:fecha_nacimiento)");
            $id = null;
            $nombre = $this->nombre;
            $apellidos = $this->apellidos;
            $correo = $this->correo;
            $telefono = $this->telefono;
            $fecha_nacimiento = $this->fecha_nacimiento;

            $this->sentencia->bindValue(":id",$id);
            $this->sentencia->bindValue(":nombre",$nombre,PDO::PARAM_STR);
            $this->sentencia->bindValue(":apellidos",$apellidos,PDO::PARAM_STR);
            $this->sentencia->bindValue(":correo",$correo,PDO::PARAM_STR);
            $this->sentencia->bindValue(":telefono",$telefono,PDO::PARAM_STR);
            $this->sentencia->bindValue(":fecha_nacimiento",$fecha_nacimiento,PDO::PARAM_STR);

            $this->sentencia->execute();
            $result = $this->sentencia->rowCount();
        }catch (PDOException $e) {
            $result = $e->getMessage();
        }

        $this->sentencia->closeCursor();
        $this->sentencia = null;

        return $result;
    }
}