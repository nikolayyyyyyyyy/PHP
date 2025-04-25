<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>

<form method="post">
    Курс:
    <select name="cource_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/cource_query.php";
        $cources = getAllCources($db);
        foreach ($cources as $cource) {
            $cource_id = $cource['cource_id'];
            $cource_name = $cource['cource_name'];
            echo "<option value='$cource_id'>$cource_name</option>";
        }
        ?>
    </select>
    Специалност:
    <select name="specialty_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/specialty_query.php";
        $specialties = getAllSpecialties($db);
        foreach ($specialties as $specialty) {
            $specialty_id = $specialty['specialty_id'];
            $specialty_name = $specialty['specialty_name'];
            echo "<option value='$specialty_id'>$specialty_name</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Търси">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cource_id = $_POST['cource_id'];
    $specialty_id = $_POST['specialty_id'];

    include_once "../config/db.php";
    include_once "../query/grades_query.php";
    $students = getAvegareGradeForStudentsForSpecialtyAndCource($db, $specialty_id, $cource_id);

    if ($students) {
        echo "<table border='2px'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Факултетен Номер</td>";
        echo "<td>Първо Име</td>";
        echo "<td>Курс</td>";
        echo "<td>Пециалност</td>";
        echo "<td>Среден успех</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['faculty_number'] . "</td>";
            echo "<td>" . $student['first_name'] . "</td>";
            echo "<td>" . $student['cource_name'] . "</td>";
            echo "<td>" . $student['specialty_name'] . "</td>";
            echo "<td>" . $student['avg_grade'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}