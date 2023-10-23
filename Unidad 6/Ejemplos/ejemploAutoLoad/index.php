<?php
require_once "AutoLoad.php";

use MisClases\Usuario;
use PanelAdministrador\Usuario as UsuarioAdmin;
use PanelAdministrador\Principal;

$usuarioJuego=new Usuario();
echo "<br><b>Usuario del paquete MisClases;</b>";
echo $usuarioJuego->getNombre();

$usuarioAdmin=new UsuarioAdmin();
echo "<br><b>Usuario del paquete PanelAdministrador;</b>";
echo $usuarioAdmin->getNombre();
echo "<br><b>El NameSpace es: </b>";
$usuarioAdmin->infomacion();

//comprueba si xiste un metodo
echo "<br><b>Comprueba si existe el metodo setApellidos</b>";
if(method_exists($usuarioJuego,"setApellidos")) {
    echo "<br><p>El metodo existe</p>";
}else{
    echo "<br><p>El metodo no existe</p>";
}

//Otra forma de comprobar si existe un metodo
$metodos=get_class_methods($usuarioJuego);
$busqueda=array_search("setApellidos",$metodos);

if ($busqueda){
    echo "<br><p>El metodo existe</p>";
}else{
    echo "<br><p>El metodo no existe</p>";
}

//asi puedo ver todos los metodos disponibles
print_r($metodos);

//comprobar si existe una clase o si esta cargada
echo "<br><b>Comprueba si existe la clase Usuario</b>";
$clase=@class_exists('PanelAdministrador\Usua7rio');
//al poner @ se esconden los errores cuando no se puede abrir un archivo
if ($clase) {
    echo "<br><p>La clase existe</p>";
}else{
    echo "<br><p>La clase no existe</p>";
}


$principal=new Principal();
echo "<br>".$principal->getUsuario()->getNombre();
