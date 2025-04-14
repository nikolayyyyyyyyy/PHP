<?php session_start();

if (isset($_POST['answer2'])) {
    $_SESSION['answer2'] = $_POST['answer2'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
</head>

<body>
    <form action="result.php" method="post">
        <h3>Question 3: Wich language is used for web development?</h3>
        <input type="radio" name="answer3" value="PHP"> PHP
        <br>
        <input type="radio" name="answer3" value="PYTHON"> PYTHON
        <br>
        <input type="radio" name="answer3" value="C++"> C++
        <br>
        <input type="submit" value="Finnish">
    </form>
</body>

</html>