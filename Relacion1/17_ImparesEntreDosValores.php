<?php
if(empty($_GET["num1"])||empty($_GET["num2"])){
    echo "No has introducido los dos numeros";
}elseif($_GET["num1"]>$_GET["num2"]){
    echo "El primer numero tiene que ser menor al segundo";
}else{
    for($i=$_GET["num1"];$i<=$_GET["num2"];$i++){
        if($i%2!=0){
            echo $i."<br>";
        }
    }
}
