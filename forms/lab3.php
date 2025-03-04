<?php

    for($i = 0; $i <= 5; $i++){

        if($i % 2 == 0){
            continue;
        }

        if($i == 5){
            break;
        }

        echo $i; echo "<br>";
    }