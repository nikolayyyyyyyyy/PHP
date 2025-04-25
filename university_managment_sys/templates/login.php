<?php
session_start();
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['submit'])) {

        include_once "../config/db.php";
        include_once "../query/user_query.php";

        $user = getUserByUsername($db, htmlspecialchars(trim($_POST['username'])));

        if ($user !== null) {

            if ($user['password'] === htmlspecialchars(trim($_POST['password']))) {

                $_SESSION['user'] = $user;
                header("Location: home.php");
            } else {

                $error_message = 'Невалидно потребителско име или парола.';
            }
        } else {

            $error_message = 'Невалидно потребителско име или парола.';
        }
    }
}
?>

<form method="post">
    Имейл: <input type="text" name="username" required><br>
    Парола: <input type="password" name="password" required><br>
    <input type="submit" name="submit"><br>
    <?php echo isset($error_message) ? $error_message : '' ?>
</form>