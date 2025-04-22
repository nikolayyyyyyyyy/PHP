<?php

include_once "config.php";

$create_db_query = "create database info_books";

if (mysqli_query($db, $create_db_query)) {

    echo "Database created successfully.";
    echo "<br>";
} else {

    echo "Error creating database." . ' ' . mysqli_error($db);
    echo "<br>";
}

$create_table_query = "create table books(
    id int primary key auto_increment,
    name varchar(50) not null,
    author varchar(100) not null,
    publisher varchar(100) not null,
    date int unsigned not null
)";

if (mysqli_query($db, $create_table_query)) {

    echo "Table created successfully.";
    echo "<br>";
} else {

    echo "Error creating table " . ' ' . mysqli_error($db);
    echo "<br>";
}