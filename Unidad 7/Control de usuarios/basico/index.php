<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] !='dwes') || ($_SERVER['PHP_AUTH_PW']!='12234')){
    header('WWW-Authenticate: basic realm="acceso restringido'); //Esta hace que salga la ventana para user y pw
    header('Status: 401 Unauthorized');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Se requiere autorizacion.';
}else{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Authorizado por PHP</h2>
<p>Nombre <?=$_SERVER['PHP_AUTH_USER'];?> </p>
</body>
</html>
<?php
}
?>