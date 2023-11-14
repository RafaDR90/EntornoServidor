<?php
$servername = "localhost"; // Nombre/IP del servidor
$database = "mistiendas"; // Nombre de la BBDD
$username = "admin"; // Nombre del usuario
$password = "admin123"; // Contraseña del usuario
// Creamos la conexión utilizando la clase Mysqli
$bd=new Mysqli($servername, $username, $password, $database);
if ($bd->connect_error)
{
    die ("Error en conexión base datos: ".$bd->connect_error);
}else {
    echo "<h2>Conexión realizada correctamente</h2>";
    $sql = "SELECT * FROM productos";
    if ($resultado = $bd->query($sql)) :
?>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <select name="options" id="options">
        <?php
        while ($obj = $resultado->fetch_object()):
            echo "<option value='".$obj->cod."'>".$obj->nombre_corto."</option>";
        endwhile;
        endif;
        }?>
        <input type="submit" value="Mostrar stock">
    </select>
</form>


<?php

    if(isset($_POST['options'])):
        $opcion=$_POST['options'];
        $sql = "select tiendas.nombre, stock.unidades from tiendas, stock where tiendas.cod = stock.tienda and stock.producto = '$opcion'";
        if ($resultado = $bd->query($sql)) {
            while ($obj = $resultado->fetch_object()){
                echo "<p>Nombre: ".$obj->nombre." , Stock: ".$obj->unidades."</p>";
            }
        }
    endif;


    $bd->close();
?>
