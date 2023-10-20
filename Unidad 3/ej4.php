<?php
function potencias($base,$exponente=2){
return ($base**$exponente);
}
if(isset($_GET["exponente"])){
    echo potencias($_GET["base"],$_GET["exponente"]);
}else{
    echo potencias($_GET["base"]);
}
