<?php

$db = new PDO(
    'mysql:host=localhost;dbname=university_managment_sys',
    'root',
    ''
);

include_once "query.php";

createDatabase($db);

echo "database created successfully!";
