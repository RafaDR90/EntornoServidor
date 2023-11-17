<?php
require_once 'FuncionesFicherosTXT.php';
$fichero= 'datos.txt';
$contenido=leerTxt($fichero,5,'Index.php');
DatosUltimaLinea($contenido);
echo "<br><br><a href='Index.php'>Insertar otra vivienda</a>";
function DatosUltimaLinea($contenidoTxt):void{
    $todasLineas=explode("%", $contenidoTxt);
    $ultima = explode(';', $todasLineas[count($todasLineas) - 2]);
    echo "<h1>Insercion de vivienda</h1><p>Estos son los datos introducidos:</p><br>";
    echo "Tipo de vivienda: $ultima[0]<br>";
    echo "Zona: $ultima[1]<br>";
    echo "Direccion: $ultima[2]<br>";
    echo "Numero de dormitorios: $ultima[3]<br>";
    echo "Precio: $ultima[4]<br>";
    echo "Tamaño: $ultima[5] metros cuadrados<br>";
    echo "Extras: ".$ultima[6]."<br>";
    echo "Foto:<a target='_blank' href='UltimaImagen.php'>$ultima[8]</a><br>";
    echo "Observaciones: $ultima[7]<br>";
        echo "Beneficio: ".calcularBeneficio($ultima[1],$ultima[5],$ultima[4]).'&nbsp€';
}

function calcularBeneficio($zona,$metrosCuadrados,$precio):float{
    $beneficio=0;
    switch ($zona){
        case "centro":
            if ($metrosCuadrados<100){
                $beneficio=$precio*0.30;
            }else{
                $beneficio=$precio*0.35;
            }
            break;
        case "zaidin":
            if ($metrosCuadrados<100){
                $beneficio=$precio*0.25;
            }else{
                $beneficio=$precio*0.28;
            }
            break;
        case "chana":
            if ($metrosCuadrados<100){
                $beneficio=$precio*0.22;
            }else{
                $beneficio=$precio*0.25;
            }
            break;
        case "albaicin":
            if($metrosCuadrados<100){
                $beneficio=$precio*0.20;
            }else{
                $beneficio=$precio*0.35;
            }
            break;
        case "sacromonte":
            if($metrosCuadrados<100){
                $beneficio=$precio*0.22;
            }else{
                $beneficio=$precio*0.25;
            }
            break;
        case "realejo":
            if($metrosCuadrados<100){
                $beneficio=$precio*0.25;
            }else{
                $beneficio=$precio*0.28;
            }
            break;
    }
    return $beneficio;
}