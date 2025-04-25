<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>

<form method="post">
    Дисциплина:<br>
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

    $grade = getAverageGradeForDiscipline($db, $discipline_id);

    if ($grade) {

        echo "<table border='2px'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Дисциплина</td>";
        echo "<td>Оценка</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $grade['discipline_name'] . "</td>";
        echo "<td>" . $grade['average_grade'] . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
}