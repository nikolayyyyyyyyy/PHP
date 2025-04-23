<?php

try {
    $db = new PDO(
        'mysql:host=localhost;dbname=university_managment_sys',
        'root',
        ''
    );

} catch (PDOException $e) {

    echo $e->getMessage();
}
