<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    setcookie('backgroundcolor', $_POST['backgroundcolor'], time() + 3600, '/');
    header("Location: background_theme.php");
    exit;
}

if (!isset($_COOKIE['count'])) {

    setcookie('count', 1, time() + 3600, '/');
} else {

    setcookie('count', $_COOKIE['count'] + 1, time() + 3600, '/');
}

$backgroundColor = isset($_COOKIE['backgroundcolor']) ? $_COOKIE['backgroundcolor'] : 'white';
$n = $_COOKIE['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
</head>

<body>
    <form method="post" style="background-color:  <?php echo $backgroundColor ?>">
        <h1>Welcome</h1>

        <p>You have visited this page <?php echo $n ?> times.</p>

        <span>Choose background color:</span>

        <select name="backgroundcolor">
            <option value="burlywood">Dark</option>
            <option value="white">White</option>
        </select>

        <input type="submit" value="Set Color">
    </form>
</body>

</html>
