<?php
if (!empty($_POST['post'])) {

    $firm = htmlspecialchars(trim($_POST['provider_firm']));
    $bulstad = htmlspecialchars(trim($_POST['bulstad']));
    $city_id = intval(htmlspecialchars(trim($_POST['city_id'])));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $year_of_register = intval(htmlspecialchars(trim($_POST['year_of_register'])));
    $contact_person = htmlspecialchars(trim($_POST['person_to_contact']));

    if (
        !empty($firm) &&
        !empty($bulstad) &&
        !empty($city_id) &&
        !empty($telephone) &&
        !empty($year_of_register) &&
        !empty($contact_person)
    ) {

        include_once "db.php";

        $query = "INSERT INTO providers (provider_firm,bulstad,city_id,telephone_number,year_of_register,person_to_contact) 
                    VALUES (?,?,?,?,?,?)";

        $res = $db->prepare($query);
        $res->bind_param(
            "ssisis",
            $firm,
            $bulstad,
            $city_id,
            $telephone,
            $year_of_register,
            $contact_person
        );
        $res->execute();
    }
    header("Location: input_provider_form.php");
}