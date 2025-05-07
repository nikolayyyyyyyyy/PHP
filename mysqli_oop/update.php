<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2px">
        <thead>
            <tr>
                <th>Доставчик</th>
                <th>Булстат</th>
                <th>Лице за контакт</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db.php";
            $result = $db->query("SELECT provider_firm,bulstad,person_to_contact 
                            FROM providers 
                            ORDER BY provider_id");

            while ($provider = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $provider['provider_firm'] . "</td>";
                echo "<td>" . $provider['bulstad'] . "</td>";
                echo "<td>" . $provider['person_to_contact'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="update_provider.php">Редактирай</a>
</body>

</html>