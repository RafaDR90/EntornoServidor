<?php
echo "<h1>Extras del inmueble</h1>";
$extras=$_REQUEST["extras"];
//los valores recogidos estan en un array
foreach ($extras as $extra){
    print ("$extra<br>");
}