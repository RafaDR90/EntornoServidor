<?php
class Usuario{
    public function __construct(
        private string $nombre,
        private string $apellido1,
        private string $apellido2,
        private string $correo){}
}
$usuario=new Usuario("pako","gonazale","peerz","correo@gmail.com");
$usuario2=new Usuario(apellido1: "asdasd",nombre: "asdsa",apellido2: "asda",correo: "sada@gmail.com");

echo "<pre>";
var_dump($usuario);
var_dump($usuario2);
echo "</pre>";