<?php

function doesStudentHaveGradeToDiscipline(PDO $db, $discipline_id, $f_number)
{
    $query = "SELECT s.student_id FROM grades AS g
                JOIN students_grades AS sg ON sg.grade_id = g.grade_id
                JOIN students AS s ON s.student_id = sg.student_id
                JOIN disciplines AS d ON d.discipline_id = g.discipline_id
                WHERE d.discipline_id = ? AND s.faculty_number = ? LIMIT 1";

    $stmt = $db->prepare($query);
    $stmt->execute([
        $discipline_id,
        $f_number
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        return true;
    }
    return false;
}

function getAllStudents(PDO $db)
{
    $query = "SELECT st.faculty_number,
                    st.first_name,
                    st.middle_name,
                    st.last_name,
                    st.egn,
                    c.cource_name,
                    s.specialty_name,
                    e.email,
                    a.address
                FROM students AS st
                JOIN specialties AS s ON s.specialty_id = st.specialty_id
                JOIN cources AS c ON c.cource_id = st.cource_id
                JOIN emails AS e ON e.email_id = st.email_id
                JOIN addresses AS a ON a.address_id = st.address_id
                ORDER BY student_id DESC";

    $stmt = $db->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getStudentByEgn(PDO $db, $egn)
{
    $quety = "SELECT * FROM students WHERE egn = ?";
    $stmt = $db->prepare($quety);

    $stmt->execute([$egn]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        return $row;
    } else {

        return null;
    }
}

function getStudentByFacultyNumber(PDO $db, $number)
{
    $quety = "SELECT * FROM students WHERE faculty_number = ?";
    $stmt = $db->prepare($quety);

    $stmt->execute([$number]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        return $row;
    } else {

        return null;
    }
}

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