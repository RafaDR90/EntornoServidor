<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if (!is_dir("./Img")){
    echo "No tenemos imagenes";
}else{
    $barajaEsta=$barajaa->getBaraja();
    foreach ($barajaa as $carta){
        $image="./Img/".$carta->getPalo()."_".$carta->getNumero().".jpg";
        if (file_exists($image)) {
            echo "<img src='$image'/>";
        }else{
            echo "No tenemos esa carta";
        }
    }

}
?>
</body>
</html>