<?php

function insertStudent(
    PDO $db,
    string $f_number,
    string $first_name,
    string $middle_name,
    string $last_name,
    string $egn,
    int $email_id,
    int $address_id,
    int $cource_id,
    int $specialty_id
) {

    $query = "INSERT INTO students (faculty_number,first_name,middle_name,last_name,egn,cource_id,specialty_id,address_id,email_id) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $db->prepare($query);

    $stmt->execute([
        $f_number,
        $first_name,
        $middle_name,
        $last_name,
        $egn,
        $cource_id,
        $specialty_id,
        $address_id,
        $email_id
    ]);
}