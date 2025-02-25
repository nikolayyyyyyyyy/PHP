<form action="" method="post">
    Name: <input type="text" name="name"><br><br>
    Age: <input type="text" name="age"><br><br>


    <input type="radio" name="gender" >Male<br>
    <input type="radio" name="gender" >Female<br><br>
    <input type="submit" value="Go!"><br><br>
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["name"]) && !empty($_POST["age"])
         && !empty($_POST["gender"])) {
        
            $name = htmlspecialchars($_POST["name"]);
            $age = htmlspecialchars($_POST["age"]);
            $gender = htmlspecialchars($_POST["gender"]);
            echo "My name is $name.I am $age years old.I am $gender.";
        } else {

            echo "Fill all fields.";
        }
    }
