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

    public function __construct(string $nombre, string $apellidos, string $email, string $direccion, string $telefono, string $fecha_nacimiento)
    {
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

}
