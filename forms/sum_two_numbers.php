<form action="" method="post">
    <div>
        First Number:<br>
        <input type="text" name="a"><br>

        Second Number:<br>
        <input type="text" name="b"><br><br>

        <input type="submit"><br>
    </div>
</form>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["a"]) && !empty($_POST["b"])){

            $first = intval($_POST["a"]);
            $second = intval($_POST["b"]);

            echo "The sum is: ".($first + $second)."!";
        } else {

            echo "enter the two numbers.";
        }
    }
