<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<form method="post">
    Факултетен номер на студента: <input type="text" name="f_number"><br>
    Оценка:<br>
    <select name="grade">
        <option value="2">Слаб (2)</option>
        <option value="3">Среден (3)</option>
        <option value="4">Добър (4)</option>
        <option value="5">Мн. Добър (5)</option>
        <option value="6">Отличен (6)</option>
    </select><br>
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
    <input type="submit" value="Добави">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once "../config/db.php";
    include_once "../query/student_query.php";

    $f_number = htmlspecialchars(trim($_POST['f_number']));
    $student = getStudentByFacultyNumber($db, $f_number);
    $grade = intval($_POST['grade']);
    $discipline_id = intval($_POST['discipline_id']);

    if ($student !== null) {

        if (!doesStudentHaveGradeToDiscipline($db, $discipline_id, $f_number)) {
            include_once "../query/grades_query.php";

            $grade_id = insertIntoGrade($db, $grade, date("Y-j-n H:i:s"), $discipline_id);

            insertIntoStudentsGrades($db, $student['student_id'], $grade_id);
        }
    }
}
