    <tr>
        <form name="añadir_registro" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <td><input type="text" id="concepto" name="concepto" required></td>
            <td><input type="text" id="fecha" name="fecha" required></td>
            <td><input type="text" id="importe" name="importe" pattern="[0-9]*\.?[0-9]*" inputmode="numeric" required></td>
            <td><input type="submit" name="añadir_registro" value="A&ntilde;adir registro"></td>
        </form>
    </tr>
</table>
</main>
<footer>
    <hr>
    <div id="divFooter">
        <div>
            <p>El numero de registros del monedero es: </p>
            <p class="colorRed">El Balance del monedero es de: €</p>
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