<?
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}
?>

<form method="post">
    Факултетен номер: <input type="text" name="f_number"><br>
    Първо име: <input type="text" name="first_name" /><br>
    Презиме: <input type="text" name="middle_name" /><br>
    Фамилия: <input type="text" name="last_name" /><br>
    ЕГН: <input type="text" name="egn" /><br>
    Имейл: <input type="text" name="email" /><br>
    Адрес: <input type="text" name="address" /><br>
    Курс:<br>
    <select name="cource_id">
        <?php
        include_once "../config/db.php";
        include_once "../query/cource_query.php";

        $cources = getAllCources($db);

        if ($cources) {

            foreach ($cources as $cource) {
                $cource_id = $cource['cource_id'];
                $cource_name = $cource['cource_name'];

                echo "<option value='$cource_id'>$cource_name</option>";
            }
        }
        ?>
    </select><br>
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
    </select><br>
    <input type="submit" name="submit" value="Добави">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $f_number = htmlspecialchars(trim($_POST['f_number']));
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $middle_name = htmlspecialchars(trim($_POST['middle_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $egn = htmlspecialchars(trim($_POST['egn']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));
    $cource_id = htmlspecialchars(trim($_POST['cource_id']));
    $specialty_id = htmlspecialchars(trim($_POST['specialty_id']));

    if (
        !empty($f_number) && !empty($first_name) &&
        !empty($middle_name) && !empty($last_name) &&
        !empty($egn) && !empty($email) &&
        !empty($address) && !empty($cource_id) && !empty($specialty_id)
    ) {
        include_once "../config/db.php";
        include_once "../query/email_query.php";
        include_once "../query/addresses_query.php";
        $email_row = getEmailByName($db, $email);
        $address_row = getAddressByAddressName($db, $address);

        if ($email_row === null && $address_row === null) {

            $email_id = insertEmail($db, $email);
            $address_id = insertAddress($db, $address);

            include_once "../query/student_query.php";
            insertStudent($db, $f_number, $first_name, $middle_name, $last_name, $egn, $email_id, $address_id, $cource_id, $specialty_id);

            header("Location: home.php");
        }
    }
}
