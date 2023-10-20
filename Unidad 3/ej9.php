<?php
function contrasena($cadena){
    if(strlen($cadena) >= 6 && strlen($cadena) <= 15 && preg_match("/[A-Z]+/", $cadena) &&
        preg_match("/[a-z]+/", $cadena) && preg_match("/[0-9]+/", $cadena) && preg_match("/[^a-zA-Z0-9]/", $cadena)){
        echo "contraseña valida";
    }else{
        echo "contraseña invalida";
    }
}
contrasena("Manol_o123");