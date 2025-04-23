<?php
session_start();
if (isset($_SESSION['user'])) {

    if ($_SESSION['user']['role_name'] == "АДМИН") {

        echo "<a href='add_student.php'>Добави студент</a>";
        echo "<br>";
        echo "<a href='add_teacher.php'>Добави преподавател</a>";
        echo "<br>";
        echo "<a href='add_grade.php'>Добави оценка</a>";
        echo "<br>";
        echo "<a href='logout.php'>Изход</a>";
        echo "<br>";
    }
} else {
    header("Location: login.php");
}