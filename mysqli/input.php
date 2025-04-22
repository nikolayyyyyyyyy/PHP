<form method="post">
    Заглавие: <input type="text" name="name"><br>
    Автор: <input type="text" name="author_name" /><br>
    Издателство: <input type="text" name="publisher"><br>
    Година на Издателство: <input type="text" name="publish_date"><br>
    <input type="submit" name="submit" value="Въведи">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['submit']) {

        if (
            !empty($_POST['name']) ||
            !empty($_POST['publisher']) ||
            !empty($_POST['publish_date']) ||
            !empty($_POST['author_name'])
        ) {
            $name = htmlspecialchars(trim($_POST['name']));
            $author = htmlspecialchars(trim($_POST['author_name']));
            $publisher = htmlspecialchars(trim($_POST['publisher']));
            $publish_date = intval(htmlspecialchars(trim($_POST['publish_date'])));

            if ($publish_date < 0) {

                echo "Годината на издаване не може да е негативна.";
            } else {

                $query = "insert into books (name,author,publisher,date) values (?,?,?,?)";
                include_once "config.php";

                $stmt = mysqli_prepare($db, $query);
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sssi', $name, $author, $publisher, $publish_date);
                    mysqli_stmt_execute($stmt);

                    echo "Added row";
                    header("Location: index.php");
                }
            }
        } else {

            echo "Попълни всички полета.";
        }
    }
}