<?php
if (isset($_COOKIE['miCookie'])){
    echo "<h3>".$_COOKIE['miCookie']."</h3>";
}else{
    echo "No existe la cookie";
}
echo "<a href='borrar_cookies.php'>Borrar Cookies</a>";