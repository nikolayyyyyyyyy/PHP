<form method="post">
    <h1>Обратна връзка</h1>
    <p>Име:</p>
    <input type="text" name="name">
    <p>Имейл:</p>
    <input type="text" name="email">
    <p>Съобщение:</p>
    <textarea name="message" rows="5" cols="20"></textarea>
    <br><br>
    <input type="submit" value="Изпрати">
    <h2>Предишни съобщения:</h2>
    <?php
    printMessages("messages.txt");
    ?>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $file = fopen("messages.txt", "a+");
        fwrite($file, date("Y-m-D G:i:s") . " | " . $name . " | " . $email . " | " . $message . PHP_EOL);
    }
}

function printMessages($fileName)
{
    if (file_exists($fileName)) {
        $file = file($fileName);

        array_filter($file, fn($e) => $e !== "");
        echo "<ul>";
        foreach ($file as $element) {
            echo "<li>$element</li>";
        }
        echo "</ul>";
    }
}
