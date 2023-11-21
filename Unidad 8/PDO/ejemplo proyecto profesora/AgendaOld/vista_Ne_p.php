<?php
namespace tu_namespace; // Reemplaza 'tu_namespace' con tu verdadero namespace

require_once "AutoLoad.php";
use lib\BaseDatos_Ne_p;
use models\Contacto_Ne_p;

// Autoloading y configuración pueden ir aquí si es necesario

// Crear una instancia de la clase BaseDatos_Ne_p
$baseDatos = new BaseDatos_Ne_p();

// Crear un objeto Contacto (puedes cambiar los valores según sea necesario)
$nuevoContacto = new Contacto_Ne_p("Nombre", "Apellidos", "correo@example.com", "Dirección", "123456789", "1990-01-01");

// Insertar el nuevo contacto en la base de datos
$baseDatos->insertarContacto($nuevoContacto);

// Obtener todos los contactos de la base de datos
$baseDatos->consulta("SELECT * FROM tabla_contactos");
$contactos = $baseDatos->extraer_todos();

// Aquí puedes utilizar $contactos en tu vista para mostrar la información

// Ejemplo básico de cómo mostrar los contactos
foreach ($contactos as $contacto) {
    echo "Nombre: " . $contacto['nombre'] . "<br>";
    echo "Apellidos: " . $contacto['apellidos'] . "<br>";
    echo "Correo: " . $contacto['correo'] . "<br>";
    echo "Dirección: " . $contacto['direccion'] . "<br>";
    echo "Teléfono: " . $contacto['telefono'] . "<br>";
    echo "Fecha de Nacimiento: " . $contacto['fecha_nacimiento'] . "<br>";
    echo "<hr>";
}