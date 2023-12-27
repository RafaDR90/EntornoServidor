<?php
namespace models;

class Contacto_e_Np{
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
    {}

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



    public static function fromArray(array $data):Contacto{
        return new Contacto_e_Np(
            $data['id'],
            $data['nombre'],
            $data['apellidos'],
            $data['correo'],
            $data['direccion'],
            $data['telefono'],
            $data['fecha_nacimiento']
        );
    }
}