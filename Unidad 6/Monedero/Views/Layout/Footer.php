<!-- Se ha puesto en el archivo footer.php codigo que se va a reutilizar en todas las vistas demas del respectivo
     footer que tambien se va a reutilizar en todas las vistas en caso de haber mas de una.

     Inicializa un contador para contar todas las consultas mostradas en la aplicacion  en el momento
     y otra para controlar el balance total de las anotaciones mostradas en el momento -->
<?php
$contador=0;
$total=0;
foreach ($monederos as $monedero){
    $contador++;
    $total+=$monedero->getImporte();
}
?>
<tr>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?controller=monedero&action=agregarCampo" method="post">
            <td><input type="text" id="concepto" name="concepto" required></td>
            <td><input type="text" id="fecha" name="fecha" required></td>
            <td><input type="text" id="importe" name="importe" inputmode="numeric" required></td>
            <td><input type="submit" name="añadir_registro" value="Añadir registro"></td>
        </form>
    </tr>
</table>
<hr>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="get">
        <label for="search">Buscar concepto </label>
        <input id="search" name="search" type="text">
        <input type="submit" value="¡Buscar!">
    </form>
</div>
<div id="error">
    <?php
    if (isset($errores)):
        if (count($errores)!=0): ?>
        <!-- Muestro el primer error que exista en el array de errores, no quiero mostrar muchas lineas de errores.
             En caso de querer mostrarlas todas haria un foreach, pero no es el caso-->
            <p><?php echo $errores[array_key_first($errores)]; ?></p>
        <?php endif;
    endif;
    ?>
</div>
</main>
<footer>
    <hr>
    <div id="divFooter">
        <div>
            <p>El numero de registros del monedero es: <?= $contador ?></p>
            <p class="colorRed">El Balance del monedero es de:<?= $total ?> €</p>
        </div>
        <div id="containerAnotaciones">
            <!-- Boton para volver al index sin ninguna modificacion -->
            <a class="lateral" id="anotaciones" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Ver todas las anotaciones</a>
        </div>
    </div>
    <h3>NOTA: es obligatorio rellenar todos los campos.</h3>
</footer>
</div>
</body>
</html>