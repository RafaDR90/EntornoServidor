
        <?php
        foreach ($monederos as $monedero): ?>
            <tr>
            <?php if (isset($_GET['conceptoBuscar'])&& isset($_GET['accion'])):
                if ($_GET['conceptoBuscar']==$monedero->getConcepto() && $_GET['accion']=='editar'):
                ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?controller=monedero&action=editarMonedero&conceptoEdit=<?php echo $monedero->getConcepto();?>" method="post">
                    <td><input type="text" name="concepto_edit" value="<?php echo $monedero->getConcepto();?>"></td>
                    <td><input type="text" name="fecha_edit" value="<?php echo $monedero->getFecha(); ?>"></td>
                    <td><input type="text" name="cantidad_edit" value="<?php echo $monedero->getImporte(); ?>"></td>
                    <td><input type="submit" value="Modificar"></td>
                </form>
                <?php else:?>
                    <td><?php echo $monedero->getConcepto(); ?></td>
                    <td><?php echo $monedero->getFecha(); ?></td>
                    <td><?php echo $monedero->getImporte(); ?></td>
                    <td id="td_enlaces"><a class="lateral" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=editar">Editar</a><a class="lateral" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?controller=monedero&action=borrarMonedero&conceptoBorrar=<?php echo $monedero->getConcepto(); ?>">Borrar</a></td>

                <?php endif;
                else: ?>


                    <td><?php echo $monedero->getConcepto(); ?></td>
                    <td><?php echo $monedero->getFecha(); ?></td>
                    <td><?php echo $monedero->getImporte(); ?></td>
                    <td id="td_enlaces"><a class="lateral" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=editar">Editar</a><a class="lateral" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?controller=monedero&action=borrarMonedero&conceptoBorrar=<?php echo $monedero->getConcepto(); ?>">Borrar</a></td>
        <?php endif;?>
        </tr>
        <?php endforeach;


