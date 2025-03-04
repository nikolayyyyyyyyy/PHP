<form method="post">
    Въведете число: <input type="text" name="n"><br>
    <input type="submit" value="Провери!">
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $n = $_POST["n"];

        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {

                echo "Числото $n не е просто!";
                return;
            }
        }
        echo "Числото $n е просто!";
    }