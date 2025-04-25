<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}

echo "<h1>Всички студенти</h1>";

include_once "../config/db.php";
include_once "../query/student_query.php";
$students = getAllStudents($db);

if ($students) {

    echo "<table border='2px'>";
    echo "<thead>";
    echo "<tr>";
    echo "<td>Факултетен номер</td>";
    echo "<td>Име</td>";
    echo "<td>Презиме</td>";
    echo "<td>Фамилия</td>";
    echo "<td>ЕГН</td>";
    echo "<td>Имейл</td>";
    echo "<td>Адрес</td>";
    echo "<td>Курс</td>";
    echo "<td>Специалност</td>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($students as $student) {
        $f_number = htmlspecialchars($student['faculty_number']);
        $first_name = htmlspecialchars($student['first_name']);
        $middle_name = htmlspecialchars($student['middle_name']);
        $last_name = htmlspecialchars($student['last_name']);
        $egn = htmlspecialchars($student['egn']);
        $email = htmlspecialchars($student['email']);
        $address = htmlspecialchars($student['address']);
        $cource = htmlspecialchars($student['cource_name']);
        $specialty = htmlspecialchars($student['specialty_name']);
        echo "<tr>";
        echo "<td>$f_number</td>";
        echo "<td>$first_name</td>";
        echo "<td>$middle_name</td>";
        echo "<td>$last_name</td>";
        echo "<td>$egn</td>";
        echo "<td>$email</td>";
        echo "<td>$address</td>";
        echo "<td>$cource</td>";
        echo "<td>$specialty</td>";
        echo "</tr>";

    }
    echo "</tbody>";
    echo "</table>";
}