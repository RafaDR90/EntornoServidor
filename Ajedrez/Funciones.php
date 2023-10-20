<?php
function creaTablero(){
    echo "<table>";
    for($i=0;$i<8;$i++){
        echo "<tr>";
        if($i==0){
            figurasNegras();
        }elseif($i==7){
            figurasBlancas();
        }elseif($i==1){
            peonesNegros();
        }elseif($i==6){
            peonesBlancos();
        }else{
            if($i%2==0){
                $color="gris";
            }else{
                $color="blanco";
            }
            casillaVacia($color);
        }

        echo "</tr>";
    }
    echo "</table>";
}

function figurasNegras(){
    $color="gris";
    for($i=0;$i<8;$i++){
        if($color=="blanco"){
            $color="gris";
        }else{
            $color="blanco";
        }
        $dibujo=match ($i){
            0=>"torren.png",
            1=>"caballon.png",
            2=>"alfiln.png",
            3=>"reyn.png",
            4=>"reinan.png",
            5=>"alfiln.png",
            6=>"caballon.png",
            7=>"torren.png"
        };
        echo "<td class='$color'><img src='./fichasAjedrez/$dibujo'></td>";
    }
}

function figurasBlancas(){
    $color="blanco";
    for($i=0;$i<8;$i++){
        if($color=="blanco"){
            $color="gris";
        }else{
            $color="blanco";
        }
        $dibujo=match ($i){
            0=>"torreb.png",
            1=>"caballob.png",
            2=>"alfilb.png",
            3=>"reyb.png",
            4=>"reinab.png",
            5=>"alfilb.png",
            6=>"caballob.png",
            7=>"torreb.png"
        };
        echo "<td class='$color'><img src='./fichasAjedrez/$dibujo'></td>";
    }
}

function peonesNegros(){
    $color="blanco";
    for($i=0;$i<8;$i++){
        if($color=="blanco"){
            $color="gris";
        }else{
            $color="blanco";
        }
        echo "<td class='$color'><img src='./fichasAjedrez/peon-negro.png'></td>";
    }
}

function peonesBlancos(){
    $color="gris";
    for($i=0;$i<8;$i++){
        if($color=="blanco"){
            $color="gris";
        }else{
            $color="blanco";
        }
        echo "<td class='$color'><img src='./fichasAjedrez/peon-blanco.png'></td>";
    }
}

function casillaVacia($color){
    for($i=0;$i<8;$i++){
        if($color=="blanco"){
            $color="gris";
        }else{
            $color="blanco";
        }
        echo "<td class='$color'>&nbsp</td>";
    }
}
?>

