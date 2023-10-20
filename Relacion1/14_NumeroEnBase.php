<?php

echo "<table border='solid black'><tr><th>Decimal</th><th>Binario</th><th>Octal</th><th>Hexadecimal</th></tr>";
for ($i=1;$i<=20;$i++){
    echo '<tr><td>'.$i.'</td><td>'.decbin($i).'</td><td>'.decoct($i).'</td><td>'.dechex($i).'</td></tr>';
}