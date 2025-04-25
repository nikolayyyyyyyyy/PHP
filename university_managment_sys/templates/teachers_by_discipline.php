<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("Location: home.php");
}
?>

<form method="post">
    Избери дисциплина:<br>
    <select name="discipline_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/discipline_query.php";
        $disciplines = getAllDisciplines($db);

        if ($disciplines) {

            foreach ($disciplines as $discipline) {
                $discipline_id = $discipline['discipline_id'];
                $discipline_name = $discipline['discipline_name'];
                echo "<option value='$discipline_id'>$discipline_name</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Намери">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $discipline_id = $_POST['discipline_id'];
    include_once "../config/db.php";
    include_once "../query/teacher_query.php";
    $teachers = getTeachersByDiscipline($db, $discipline_id);

    if ($teachers) {


        echo "<table border='2px'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Номер на учителя</td>";
        echo "<td>Име</td>";
        echo "<td>Презиме</td>";
        echo "<td>Фамилия</td>";
        echo "<td>Титла</td>";
        echo "<td>Имейл</td>";
        echo "<td>Телефон</td>";
        echo "<td>Катедра</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($teachers as $teacher) {
            $teacher_num = htmlspecialchars($teacher['teacher_number']);
            $first_name = htmlspecialchars($teacher['first_name']);
            $middle_name = htmlspecialchars($teacher['middle_name']);
            $last_name = htmlspecialchars($teacher['last_name']);
            $title = htmlspecialchars($teacher['title_name']);
            $email = htmlspecialchars($teacher['email']);
            $telephone = htmlspecialchars($teacher['telephone_number']);
            $department = htmlspecialchars($teacher['department_name']);
            echo "<tr>";
            echo "<td>$teacher_num</td>";
            echo "<td>$first_name</td>";
            echo "<td>$middle_name</td>";
            echo "<td>$last_name</td>";
            echo "<td>$title</td>";
            echo "<td>$email</td>";
            echo "<td>$telephone</td>";
            echo "<td>$department</td>";
            echo "</tr>";

        }
        echo "</tbody>";
        echo "</table>";
    }
}