
        <?php
        foreach ($monederos as $monedero): ?>
            <tr>
            <?php if (isset($_GET['conceptoBuscar'])&& isset($_GET['accion'])):
                if ($_GET['conceptoBuscar']==$monedero->getConcepto() && $_GET['accion']=='editar'):
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?controller='monedero&action='borrarMonederos" method="post">
                <td><input type="text" name="concepto_edit" placeholder="<?php echo $monedero->getConcepto(); ?>"></td>
                <td><input type="date" name="fecha_edit" placeholder="<?php echo $monedero->getFecha(); ?>"></td>
                <td><input type="number" name="cantidad_edit" placeholder="<?php echo $monedero->getImporte(); ?>"></td>
                <td><input type="submit" value="Modificar"></td>
                </form>
                <?php else:?>
                <td><?php echo $monedero->getConcepto(); ?></td>
                <td><?php echo $monedero->getFecha(); ?></td>
                <td><?php echo $monedero->getImporte(); ?></td>
                <td id="td_enlaces"><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=editar">Editar</a><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=borrar">Borrar</a></td>

                <?php endif;
                else: ?>


                <td><?php echo $monedero->getConcepto(); ?></td>
                <td><?php echo $monedero->getFecha(); ?></td>
                <td><?php echo $monedero->getImporte(); ?></td>
                <td id="td_enlaces"><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=editar">Editar</a><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=borrar">Borrar</a></td>

        <?php endif;?>
        </tr>
        <?php endforeach; ?>
