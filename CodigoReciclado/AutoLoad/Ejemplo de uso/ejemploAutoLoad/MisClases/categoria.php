<?php
namespace MisClases;

class Categoria{
    public function __construct(
        public string $nombre="Action",
        public string $descripcion="Categoria enfocada  las review videojuegos de accion"
    ){}
}