<?php
if(empty($_GET["nombre"])){
    echo "Escribe tu nombre";
}else{
    echo "<h2>Hola ".$_GET["nombre"]."</h2>";
}
?>
