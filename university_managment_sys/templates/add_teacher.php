<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>
<form method="post">
    Номер на учителя: <input type="text" name="teacher_number" /><br>
    Първо име: <input type="text" name="first_name" /><br>
    Презиме: <input type="text" name="middle_name" /><br>
    Фамилия: <input type="text" name="last_name" /><br>
    Имейл: <input type="text" name="email" /><br>
    Телефон: <input type="text" name="telephone"><br>
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
    </select><br>
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
    </select><br>
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

    if (
        !empty($teacher_number) && !empty($first_name) && !empty($middle_name) &&
        !empty($last_name) && !empty($email) && !empty($telephone) && !empty($title_id) && !empty($deparment_id)
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

            insertTeacher($db, $teacher_number, $first_name, $middle_name, $last_name, $email_id, $telephone_id, $title_id, $deparment_id);

            header("Location: home.php");
        }
    }
}