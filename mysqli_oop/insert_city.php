<?php
if (!empty($_POST['post'])) {

    $city_name = htmlspecialchars(trim($_POST['city']));

    if (!empty($city_name)) {

        include_once "db.php";

        $query = "INSERT INTO cities (city_name) VALUES (?)";
        
        $res = $db->prepare($query);
        $res->bind_param("s", $city_name);
        $res->execute();
    }
    header("Location: input_city_form.php");
}