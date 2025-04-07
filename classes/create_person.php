<form method="post">
    <span>First Name:</span> <input type="text" name="name"><br>
    <span>Last Name:</span> <input type="text" name="family"><br>
    <span>Email:</span> <input type="text" name="mail"><br>
    <input type="submit" value="Create and Show">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['name'];
    $author = $_POST['family'];
    $description = $_POST['mail'];

    include "classes_definition.php";
    $person = new Person($title, $author, $description);

    echo $person->show_person();
}
