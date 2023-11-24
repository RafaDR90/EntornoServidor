<?php

namespace Model;

use lib\BaseDeDatos;

class Contacto
{

    function __construct(private string|null $id=null,
                         private string $nombre="",
                         private string $apellido="",
                         private string $correo="",
                         private string $direccion="",
                         private string $telefono="",
                         private string $fecha_nacimiento=""){
    }

    public static function fromArray(array $data): Contacto {
        return new Contacto(
            $data['id']?? null,
            $data['nombre']?? '',
            $data['apellidos']?? '',
            $data['correo']?? '',
            $data['direccion']?? '',
            $data['telefono']?? '',
            $data['fecha_nacimiento']??''
        );
    }


    /* GETTERS Y SETTERS */
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
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

    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
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
}