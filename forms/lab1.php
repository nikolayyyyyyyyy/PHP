<ul style="list-style-type: square">

<?php
    for($i = 1; $i <= 10; $i++){
  
        echo "<li>X=$i</li>";
        
        echo "<ul style=\"list-style-type: circle\">";
        $n = pow($i,3);
        
        echo "<li>X^3=$n</li>";
        echo "</ul>";
    }
?>
</ul>