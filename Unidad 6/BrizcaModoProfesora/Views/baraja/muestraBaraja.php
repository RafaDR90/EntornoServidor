<?php
if (!is_dir("./Img")){
    echo "No tenemos imagenes";
}else{
    foreach ($mazo as $carta){
        $image="./Img/".$carta->getPalo()."_".$carta->getNumero().".jpg";
        if (file_exists($image)) {
            echo "<img src='$image'/>";
        }else{
            echo "No tenemos esa carta";
        }
    }

}
?>