<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>
<form method="post">
    Номер на учителя: <input type="text" name="teacher_number" /><br><br>
    Първо име: <input type="text" name="first_name" /><br><br>
    Презиме: <input type="text" name="middle_name" /><br><br>
    Фамилия: <input type="text" name="last_name" /><br><br>
    Имейл: <input type="text" name="email" /><br><br>
    Телефон: <input type="text" name="telephone"><br><br>
    Титла:<br>
    <select name="title_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/title_query.php";

        $titles = getAllTitles($db);

        if ($titles) {

            foreach ($titles as $title) {
                $title_id = $title['title_id'];
                $title_name = $title['title_name'];
                echo "<option value='$title_id'>$title_name</option>";
            }
        }
        ?>
    </select><br><br>
    Катедра:<br>
    <select name="department_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/deparmtnet_query.php";

        $deparmtnets = getAllDepartmnets($db);
        if ($deparmtnets) {

            foreach ($deparmtnets as $department) {
                $deparmtnet_id = $department['department_id'];
                $deparmtnet_name = $department['department_name'];
                echo "<option value='$deparmtnet_id'>$deparmtnet_name</option>";
            }
        }
        ?>
    </select><br><br>
    Дисциплини:<br>
    <select name="disciplines[]" multiple>
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
    </select><br><br>
    <input type="submit" name="submit" value="Добави">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $teacher_number = htmlspecialchars(trim($_POST['teacher_number']));
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $middle_name = htmlspecialchars(trim($_POST['middle_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $title_id = htmlspecialchars(trim($_POST['title_id']));
    $deparment_id = htmlspecialchars(trim($_POST['department_id']));
    $disciplines_id = $_POST['disciplines'];
    if (
        !empty($teacher_number) && !empty($first_name) && !empty($middle_name) &&
        !empty($last_name) && !empty($email) && !empty($telephone) && !empty($title_id) && !empty($deparment_id)
        && count($disciplines_id) >= 1
    ) {

        include_once "../config/db.php";
        include_once "../query/email_query.php";
        include_once "../query/telephone_query.php";
        include_once "../query/teacher_query.php";

        $email_row = getEmailByName($db, $email);
        $telephone_row = getTelephoneByNumber($db, $telephone);
        $teacher_row = getTeacherByNumber($db, $teacher_number);

        if ($email_row === null && $telephone_row === null && $teacher_row === null) {

            $email_id = insertEmail($db, $email);
            $telephone_id = insertTelephone($db, $telephone);

            $teacher_id = insertTeacher($db, $teacher_number, $first_name, $middle_name, $last_name, $email_id, $telephone_id, $title_id, $deparment_id);
            foreach ($disciplines_id as $discipline_id) {

                insertIntoStudentsDisciplines($db, $teacher_id, intval($discipline_id));
            }
            header("Location: home.php");
        }
    }
}