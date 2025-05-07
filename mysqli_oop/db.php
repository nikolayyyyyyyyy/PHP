<?php

$db = new mysqli(
    'localhost',
    'root',
    '',
    'information_for_providers'
);

if ($db->connect_error) {

    die("Problem " . $db->connect_error);
}

include_once "create.php";

// createDatabase($db);

// createTables($db);
