<td><?php echo $monedero->getConcepto(); ?></td>
<td><?php echo $monedero->getFecha(); ?></td>
<td><?php echo $monedero->getImporte(); ?></td>
<td id="td_enlaces"><a class="lateral" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?conceptoBuscar=<?php echo $monedero->getConcepto(); ?>&accion=editar">Editar</a><a class="lateral" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?controller=monedero&action=borrarMonedero&conceptoBorrar=<?php echo $monedero->getConcepto(); ?>">Borrar</a></td>
