<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>

<form method="post">
    Дисциплине:<br>
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
    </select><br>
    <input type="submit" value="Намери">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $discipline_id = $_POST['discipline_id'];
    include_once "../config/db.php";
    include_once "../query/grades_query.php";

    $topStudents = getExcellentStudentsForDiscipline($db, $discipline_id);

    if ($topStudents) {
        echo "<table border='2px'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Факултетен номер</td>";
        echo "<td>Първо име</td>";
        echo "<td>Последно име</td>";
        echo "<td>Дисциплина</td>";
        echo "<td>Оценка</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($topStudents as $top) {
            echo "<tr>";
            echo "<td>" . $top['faculty_number'] . "</td>";
            echo "<td>" . $top['first_name'] . "</td>";
            echo "<td>" . $top['last_name'] . "</td>";
            echo "<td>" . $top['discipline_name'] . "</td>";
            echo "<td>" . $top['avg_grade'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}