<?php

function insertIntoGrade(PDO $db, $grade, $date, $discipline_id)
{
    $query = "INSERT INTO grades (grade,date,discipline_id) VALUES (?,?,?)";

    $stmt = $db->prepare($query);

    $stmt->execute([$grade, $date, $discipline_id]);

    return $db->lastInsertId();
}

function insertIntoStudentsGrades(PDO $db, $student_id, $grade_id)
{
    $query = "INSERT INTO students_grades (student_id,grade_id) VALUES (?,?)";

    $stmt = $db->prepare($query);
    $stmt->execute([$student_id, $grade_id]);
}

function getAvegareGradeForStudentsForSpecialtyAndCource(PDO $db, $specialty_id, $cource_id)
{
    $query = "SELECT 
                    s.faculty_number,
                    s.first_name,
                    c.cource_name,
                    sp.specialty_name,
                    FORMAT(AVG(g.grade),2) AS 'avg_grade'
                FROM students AS s
                JOIN students_grades AS sg ON sg.student_id = s.student_id
                JOIN grades AS g ON g.grade_id = sg.grade_id
                JOIN cources AS c ON c.cource_id = s.cource_id
                JOIN specialties AS sp ON sp.specialty_id = s.specialty_id
                WHERE c.cource_id = ? AND sp.specialty_id = ?
                GROUP BY s.faculty_number,s.first_name,c.cource_name,sp.specialty_name
                ORDER BY s.student_id DESC";

    $stmt = $db->prepare($query);
    $stmt->execute([$cource_id, $specialty_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAverageGradeForDiscipline(PDO $db, $discipline_id)
{
    $query = "SELECT 
                    d.discipline_name,FORMAT(AVG(g.grade),2) AS 'average_grade'
                FROM grades AS g
                JOIN disciplines AS d ON g.discipline_id = d.discipline_id
                WHERE d.discipline_id = ?";

    $stmt = $db->prepare($query);

    $stmt->execute([$discipline_id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getExcellentStudentsForDiscipline(PDO $db, $discipline_id)
{
    $query = "SELECT 
                s.faculty_number,
                s.first_name,
                s.last_name,
                d.discipline_name,
                AVG(g.grade) AS 'avg_grade'
                FROM students AS s
                JOIN students_grades AS sg ON sg.student_id = s.student_id
                JOIN grades AS g ON g.grade_id = sg.grade_id
                JOIN disciplines AS d ON d.discipline_id = g.discipline_id
                WHERE d.discipline_id = ?
                GROUP BY s.faculty_number,s.first_name,s.last_name,d.discipline_name
                HAVING AVG(g.grade) >= 5.50
                LIMIT 3";
    $stmt = $db->prepare($query);

    $stmt->execute([$discipline_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getExcellentStudentsFromSpecialty(PDO $db, $specialty_id)
{
    $query = "SELECT 
                    s.faculty_number,
                    s.first_name,
                    s.middle_name,
                    s.last_name,
                    s.egn,
                    e.email,
                    c.cource_name,
                    a.address,
                    ss.specialty_name,
                    AVG(g.grade) AS 'avg_grade'
                FROM students AS s
                JOIN students_grades AS sg ON sg.student_id = s.student_id
                JOIN grades AS g ON g.grade_id = sg.grade_id
                JOIN specialties AS ss ON ss.specialty_id = s.specialty_id
                JOIN emails AS e ON e.email_id = s.email_id
                JOIN cources AS c ON c.cource_id = s.cource_id
                JOIN addresses AS a ON a.address_id = s.address_id
                WHERE ss.specialty_id = ?
                GROUP BY s.faculty_number,s.first_name,s.middle_name,s.last_name,s.egn,e.email,c.cource_name,a.address,ss.specialty_name
                HAVING AVG(g.grade) > 5";
    $stmt = $db->prepare($query);
    $stmt->execute([$specialty_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


























