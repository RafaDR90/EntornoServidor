<?php

namespace models;
use PDO;
use PDOException;
use lib\BaseDatos_Ne_p;
class Contacto_Ne_p
{
    private string $nombre;
    private string $apellidos;
    private string $email;
    private string $direccion;
    private string $telefono;
    private string $fecha_nacimiento;
    private string|null $id;

    public function __construct(?string $id,string $nombre, string $apellidos, string $email, string $direccion, string $telefono, string $fecha_nacimiento)
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function getFechaNacimiento(): string
    {
        return $this->fecha_nacimiento;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function setFechaNacimiento(string $fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }



    public static function fromArray(array $data):Contacto_Ne_p{
        return new Contacto_Ne_p(
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
