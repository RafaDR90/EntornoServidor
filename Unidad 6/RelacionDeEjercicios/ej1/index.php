<?php
require_once "coche.php";

$coche1=new Coche();
echo "<h1>Datos del coche</h1>";
echo "<ul>";
echo "<li>MARCA: ".$coche1->getMarca()."</li>";
echo "<li>MODELO: ".$coche1->getModelo()."</li>";
echo "<li>COLOR: ".$coche1->getColor()."</li>";
echo "<li>CABALLOS: ".$coche1->getCaballos()."</li>";
echo "<li>VELOCIDAD: ".$coche1->getVelocidad()."</li>";
echo "<li>PLAZAS: ".$coche1->getNumDePlazas()."</li>";
echo "</ul>";

$coche1->setColor("Amarrillo");

$coche1->acelerar();
$coche1->acelerar();
$coche1->acelerar();
$coche1->acelerar();
$coche1->frenar();

echo "Velocidad: ".$coche1->getVelocidad()."<br>";

$coche2=new Coche(modelo: "Gallardo",color: "Verde");

echo "<h1>Datos del coche</h1>";
echo "<ul>";
echo "<li>MARCA: ".$coche2->getMarca()."</li>";
echo "<li>MODELO: ".$coche2->getModelo()."</li>";
echo "<li>COLOR: ".$coche2->getColor()."</li>";
echo "<li>CABALLOS: ".$coche2->getCaballos()."</li>";
echo "<li>VELOCIDAD: ".$coche2->getVelocidad()."</li>";
echo "<li>PLAZAS: ".$coche2->getNumDePlazas()."</li>";
echo "</ul>";