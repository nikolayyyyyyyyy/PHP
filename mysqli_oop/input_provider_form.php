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
    <form action="insert_provider.php" method="post">
        <label>Фирма:</label>
        <input type="text" name="provider_firm"><br>
        <label>Булстад:</label>
        <input type="text" name="bulstad"><br>
        <label>Населено място:</label>
        <select name="city_id">
            <option value="" disabled selected>Избери</option>
            <?php
            include_once "db.php";
            $cities = "SELECT * FROM cities ORDER BY city_id";
            $res = $db->query($cities);
            while ($city = $res->fetch_assoc()) {
                $city_id = $city['city_id'];
                $city_name = $city['city_name'];
                echo "<option value='$city_id'>$city_name</option>";
            }
            ?>
        </select><br>
        <label>Телефон:</label>
        <input type="text" name="telephone"><br>
        <label>Година на регистрация:</label>
        <input type="text" name="year_of_register"><br>
        <label>Лице за контакт:</label>
        <input type="text" name="person_to_contact"><br>
        <input type="submit" name="post" value="Въведи">
    </form>
    <table border="2px">
        <thead>
            <tr>
                <th>Доставчик</th>
                <th>Булстад</th>
                <th>Адрес</th>
                <th>Телефон</th>
                <th>Година на регистрация</th>
                <th>Лице за контакт</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "db.php";
            $providers = "SELECT * FROM providers AS p
                            JOIN cities AS c ON c.city_id = p.city_id
                            ORDER BY p.provider_id";
            $res = $db->query($providers);
            while ($provider = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $provider['provider_firm'] . "</td>";
                echo "<td>" . $provider['bulstad'] . "</td>";
                echo "<td>" . $provider['city_name'] . "</td>";
                echo "<td>" . $provider['telephone_number'] . "</td>";
                echo "<td>" . $provider['year_of_register'] . "</td>";
                echo "<td>" . $provider['person_to_contact'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>