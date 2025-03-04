<table border="2">
<?php

    for($i = 1;$i < 8;$i++){
        echo "<tr>";

        for($j = 1; $j < 8; $j++){

            $n = $i * $j;
            echo "<td>$n</td>";
        }
        
        echo "</tr>";
    }

?>
</table>

