<?php

function getTeacherByNumber(PDO $db, $number)
{
    $quety = "SELECT * FROM teachers WHERE teacher_number = ?";
    $stmt = $db->prepare($quety);

    $stmt->execute([$number]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        return $row;
    } else {

        return null;
    }
}

function insertTeacher(
    PDO $db,
    $teacher_number,
    $fisrt_name,
    $middle_name,
    $last_name,
    $email_id,
    $telepone_id,
    $title_id,
    $department_id
) {

    $query = "INSERT INTO teachers (teacher_number,first_name,middle_name,last_name,title_id,telephone_id,department_id,email_id) VALUES (?,?,?,?,?,?,?,?)";

    $stmt = $db->prepare($query);
    $stmt->execute([
        $teacher_number,
        $fisrt_name,
        $middle_name,
        $last_name,
        $title_id,
        $telepone_id,
        $department_id,
        $email_id
    ]);
}