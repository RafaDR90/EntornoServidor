<?php
$contacto=$_REQUEST["contacto"];
$metodoDePago=$_REQUEST["pago"];
foreach ($contacto as $key => $valor){
    echo "$key: $valor <br>";
}
echo "<br>Metodo de pago: ".$metodoDePago["metodoDePago"];
