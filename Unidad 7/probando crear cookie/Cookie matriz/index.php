<?php
if (!isset($_COOKIE['contador'])) {
    $contador = 1;
    setcookie("contador", $contador);
} else {
    $contador = $_COOKIE['contador'];
    $contador++;
    setcookie("contador", $contador);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrarCookie'])) {
    unset($_COOKIE['contador']);
    setcookie("contador", "", time() - 100);
    for($i=1;$i<=$contador;$i++){
        unset($_COOKIE["fecha[$i]"]);
        setcookie("fecha[$i]","",time()-100);
    }
}

setcookie("fecha[$contador]", date('d/m/Y H:i:s'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Visitas - Página con Cookies</title>
</head>
<body>
<h1>CONTROL DE VISITAS - PÁGINA CON COOKIES</h1>

<form method="post" action="#">
    <input type="submit" name="borrarCookie" value="Borrar cookie">
    <input type="submit" name="recargarPagina" value="Recargar página">
</form>

<?php
echo "Número de visitas: $contador";
if (isset($_COOKIE["fecha[1]"])):
for ($i=1;$i<=$contador;$i++):
?>
<p><?php echo $_COOKIE["fecha[$i]"] ?></p>
<?php endfor;
endif;?>


</body>
</html>
