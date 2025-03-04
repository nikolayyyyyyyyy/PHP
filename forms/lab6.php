<form method="post">
    Въведете число: <input type="text" name="n"><br>
    <input type="submit" value="Провери!">
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $n = $_POST["n"];
        $counter = 0;

        for($i = 0; $i < strlen($n); $i++){

            $num = intval($n[$i]);
            if($num % 2 == 0){

                $counter++;
            }
        }
        
        if($counter > 1){
            
            echo "Числото $n съдържа $counter четни цифри.";
        } else if($counter == 1){

            echo "Числото $n съдържа 1 четнa цифрa.";
        } else {

            echo "Няма четни цифри.";
        }
    }