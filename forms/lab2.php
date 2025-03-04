<?php

    $whileCounter = 1;

    while($whileCounter < 10){

        echo "abc ";
        $whileCounter++;
    }

    echo "<br>";
    $doWhileCounter = 1;

    do{
        echo "xyz ";
        $doWhileCounter++;

    } while($doWhileCounter < 10);

    echo "<br>";
    
    echo "<ol>";
    for($i = 65; $i <= 70; $i++){

        $letter = chr($i);
        echo "<li> Item $letter</li>";
    }
    echo "</ol>";