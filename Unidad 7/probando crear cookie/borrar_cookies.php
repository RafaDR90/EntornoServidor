<?php
if (isset($_COOKIE['miCookie'])){
    unset($_COOKIE['miCookie']);
    setcookie("miCookie","",time()-100);
}
?>
<a href="ver_cookies.php">Ver Cookies</a>
