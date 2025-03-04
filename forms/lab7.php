<form method="post">
    Enter a number: <input type="text" name="n"><br>
    <input type="submit" value="Go">
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $n = intval($_POST["n"]);

        for($i = 1; $i <= 100; $i++){

            if($i >= 10){
                $num = (string) $i;

                $first = $num[0];
                $second = $num[1];

                if($first + $second == $n){

                    echo $i; echo "<br>";
                }

            } else {
                if($i == $n){

                    echo $n; echo "<br>";
                }
            }
        }
    }