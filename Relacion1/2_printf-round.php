<?php
$radio=10;
$longitud=2*M_PI*$radio;
$superficie=4*M_PI*$radio**2;
printf("La longitud es %.2f y la superficie es %.2f",$longitud,$superficie);
echo "<br>La longitud es ".round($longitud,2)." y la superficie es ".round($superficie,2);