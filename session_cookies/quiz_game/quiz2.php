<?php session_start();
if (isset($_POST['answer1'])) {
    $_SESSION['answer1'] = $_POST['answer1'];
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
    <form action="quiz3.php" method="post">
        <h3>Question 2: What is 2 + 2?</h3>
        <input type="radio" name="answer2" value="4"> 4
        <br>
        <input type="radio" name="answer2" value="3"> 3
        <br>
        <input type="radio" name="answer2" value="5"> 5
        <br>
        <input type="submit" value="Next">
    </form>
</body>

</html>