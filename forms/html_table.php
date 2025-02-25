<form action="" method="post">
    Name: <input type="text" name="name"><br><br>
    Phone number: <input type="text" name="phone"><br><br>
    Age: <input type="text" name="age"><br><br>
    Address: <input type="text" name="address"><br><br>
    <input type="submit" value="Go!">
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["name"]) && !empty($_POST["phone"])
        && !empty($_POST["age"]) && !empty($_POST["address"])){
        
            $name = htmlspecialchars($_POST["name"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $age = htmlspecialchars($_POST["age"]);
            $address = htmlspecialchars($_POST["address"]);

            echo "<table border='2'>";
            
            echo "<tr><th style='background-color: orange'>Name</th><td>$name</td></tr>";
            echo "<tr><th style='background-color: orange'>Phone number</th><td>$phone</td></tr>";
            echo "<tr><th style='background-color: orange'>Age</th><td>$age</td></tr>";
            echo "<tr><th style='background-color: orange'>Address</th><td>$address</td></tr>";
            
            echo "</table>";
        } else {

            echo "Fill all fields.";
        }
    }
