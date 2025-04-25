<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>

<form method="post">
    Специалност:<br>
    <select name="specialty_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/specialty_query.php";

        $specialties = getAllSpecialties($db);
        if ($specialties) {

            foreach ($specialties as $specialty) {
                $specialty_id = $specialty['specialty_id'];
                $specialty_name = $specialty['specialty_name'];
                echo "<option value='$specialty_id'>$specialty_name</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Намери">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $specialty_id = $_POST['specialty_id'];

    include_once "../config/db.php";
    include_once "../query/grades_query.php";

    $students = getExcellentStudentsFromSpecialty($db, $specialty_id);
    if ($students) {

        echo "<table border='2px'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Факултетен номер</td>";
        echo "<td>Първо име</td>";
        echo "<td>Презиме</td>";
        echo "<td>Фамилия</td>";
        echo "<td>ЕГН</td>";
        echo "<td>Имейл</td>";
        echo "<td>Курс</td>";
        echo "<td>Адрес</td>";
        echo "<td>Специалност</td>";
        echo "<td>Оценка</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['faculty_number'] . "</td>";
            echo "<td>" . $student['first_name'] . "</td>";
            echo "<td>" . $student['middle_name'] . "</td>";
            echo "<td>" . $student['last_name'] . "</td>";
            echo "<td>" . $student['egn'] . "</td>";
            echo "<td>" . $student['email'] . "</td>";
            echo "<td>" . $student['cource_name'] . "</td>";
            echo "<td>" . $student['address'] . "</td>";
            echo "<td>" . $student['specialty_name'] . "</td>";
            echo "<td>" . $student['avg_grade'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}