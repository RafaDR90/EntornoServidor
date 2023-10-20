<?php

echo "<table border='solid black'>";
for ($i=1;$i<=10;$i++){
    echo "<tr>";
    for($j=1;$j<=10;$j++){
        echo '<td>'.$j.' x '.$i.' = '.($j*$i).'</td>';
    }
    echo "</tr>";
}
echo "</table>";