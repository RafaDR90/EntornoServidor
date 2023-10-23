<?php
namespace PanelAdministrador;
use MisClases\Usuario,
    MisClases\Categoria,
    MisClases\Entrada;

class Principal
{
    public function __construct(
        private $usuario = new Usuario(),
        private $categoria = new Categoria(),
        private $entrada = new Entrada()
    )
    {
    }


    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function getEntrada(): Entrada
    {
        return $this->entrada;
    }

    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    public function setEntrada($entrada): void
    {
        $this->entrada = $entrada;
    }
}