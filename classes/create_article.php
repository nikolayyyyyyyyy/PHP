<form method="post">
    <span>Title:</span> <input type="text" name="title"><br>
    <span>Author:</span> <input type="text" name="author"><br>
    <span>Description:</span> <input type="text" name="description"><br>
    <input type="submit" value="Create and Show">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    include "ex3.php";

    $book = new Article($title, $author, $description);
    echo $book->show_article();
}