<?php

function getTeachersByDiscipline(PDO $db, $discipline_id)
{
    $query = "SELECT 
                    t.first_name,
                    t.middle_name,
                    t.last_name,
                    t.teacher_number,
                    e.email,
                    tl.telephone_number,
                    tt.title_name,
                    dp.department_name
                FROM
                    teachers AS t
                        JOIN
                    teachers_disciplines AS td ON td.teacher_id = t.teacher_id
                        JOIN
                    disciplines AS d ON d.discipline_id = td.discipline_id
                        JOIN
                    emails AS e ON e.email_id = t.email_id
                        JOIN
                    titles AS tt ON tt.title_id = t.title_id
                        JOIN 
                    telephones AS tl ON tl.telephone_id = t.telephone_id
                        JOIN
                    departments AS dp ON dp.department_id = t.department_id
                WHERE
                    d.discipline_id = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$discipline_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertIntoStudentsDisciplines(PDO $db, $teacher_id, $discipline_id)
{
    $query = "INSERT INTO teachers_disciplines (teacher_id,discipline_id) VALUES (?,?)";
    $stmt = $db->prepare($query);

    $stmt->execute([$teacher_id, $discipline_id]);
}

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

    return $db->lastInsertId();
}