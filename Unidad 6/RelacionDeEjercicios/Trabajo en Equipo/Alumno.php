<?php



class Alumno{

    public function __construct(
        public string $nombre,
        public string $apellidos,
        public int $telefono,
        public string $direccion,
        public int $nota
    ){}

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

    public function setApellidos(string $email): void
    {
        $this->email = $this->apellidos;
    }

    public function getTelefono(): int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function getNota(): int
    {
        return $this->nota;
    }

    public function setNota(int $nota): void
    {
        $this->nota = $nota;
    }



}