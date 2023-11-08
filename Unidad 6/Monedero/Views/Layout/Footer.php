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
            <td><input type="text" id="importe" name="importe" pattern="[0-9]*\.?[0-9]*" inputmode="numeric" required></td>
            <td><input type="submit" name="añadir_registro" value="Añadir registro"></td>
        </form>
    </tr>
</table>
<hr>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="search">Buscar concepto </label>
        <input id="search" name="search" type="text">
        <input type="submit" value="¡Buscar!">
    </form>
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
            <a id="anotaciones" href="#">Ver todas las anotaciones</a>
        </div>
    </div>
    <h3>NOTA: es obligatorio rellenar el campo Concepto.</h3>
</footer>
</div>
</body>
</html>