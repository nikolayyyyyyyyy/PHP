<?php

function createDatabase(mysqli $db)
{
    $create_db = "CREATE DATABASE `information_for_providers`";
    $db->query($create_db);
}

function createTables(mysqli $db)
{
    $create_table_cities = "CREATE TABLE cities(
                    city_id INT PRIMARY KEY AUTO_INCREMENT,
                    city_name VARCHAR(100) UNIQUE NOT NULL
                )";
    $db->query($create_table_cities);

    $create_table_providers = "CREATE TABLE providers (
                    provider_id INT PRIMARY KEY AUTO_INCREMENT,
                    provider_firm VARCHAR(100) UNIQUE NOT NULL,
                    bulstad VARCHAR(100) UNIQUE NOT NULL,
                    city_id INT NOT NULL,
                    telephone_number VARCHAR(10) UNIQUE NOT NULL,
                    year_of_register INT NOT NULL,
                    person_to_contact VARCHAR(100) NOT NULL,
                    FOREIGN KEY (city_id) REFERENCES cities(city_id),
                    CONSTRAINT tn_ck CHECK (LENGTH(telephone_number) = 10) 
                )";
    $db->query($create_table_providers);
}