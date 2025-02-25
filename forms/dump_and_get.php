<Form method="post">

    Name:<br>
    <input type="text" name="name"/><br><br>

    Age:<br>
    <input type="text" name="age"/><br><br>

    Town:<br>
    <select id="dropdown" name="town">
        <option value="Смядово">Смядово</option>
        <option value="Шумен">Шумен</option>
        <option value="Варна">Варна</option>
    </select><br><br>

    <input type="submit" value="Submit" />
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["town"])){

            var_dump($_POST);
        } else {

            echo "Fill the formular";
        }
    }
