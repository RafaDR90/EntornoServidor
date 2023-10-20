<?php
$fecha=date('Y-m-d');
$ayer=date('Y,m,d',strtotime('-1 day',strtotime($fecha)));
$manana=date('Y,m,d',strtotime('+1 day', strtotime($fecha)));
echo "La fechade hoy es $fecha, la fecha de ayer fue $ayer y la de mñn sera $manana";