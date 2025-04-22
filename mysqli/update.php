<table border="1px">
    <thead>
        <th>Номер</th>
        <th>Заглавие</th>
        <th>Автор</th>
        <th>Издателство</th>
        <th>Година</th>
    </thead>
    <tbody>
        <?php
        include_once "config.php";

        $query = "select * from books";
        $result = mysqli_query($db, $query);

        if ($result) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['publisher'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table><br>
<a href="update_process.php">Редактиране</a>