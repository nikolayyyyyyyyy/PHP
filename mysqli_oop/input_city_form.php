<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            padding-left: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <form action="insert_city.php" method="post">
        <label>Град:</label>
        <input type="text" name="city"><br>
        <input type="submit" name="post" value="Въведи">
    </form>
    <table border="2px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Име на градът</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db.php";
            $result = $db->query("SELECT * FROM cities ORDER BY city_id");

            while ($city = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $city['city_id'] . "</td>";
                echo "<td>" . $city['city_name'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>