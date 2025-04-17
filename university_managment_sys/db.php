<?php

$db = new PDO(
    'mysql:host=localhost;dbname=university_managment_sys',
    'root',
    ''
);

$db->exec("CREATE TABLE IF NOT EXISTS specialties (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(20) UNIQUE NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    faculty_number INT UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    `address` VARCHAR(150) UNIQUE NOT NULL,
    specialty_id INT NOT NULL,
    cource_id INT NOT NULL,
    FOREIGN KEY (specialty_id)
        REFERENCES specialties (id)
)");

$db->exec("CREATE TABLE IF NOT EXISTS titles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(10) UNIQUE NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) UNIQUE NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS teachers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    telephone_number CHAR(10) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    title_id INT NOT NULL,
    department_id INT NOT NULL,
    CONSTRAINT ck_telephone_teacher CHECK (LENGTH(telephone_number) = 10),
    FOREIGN KEY (title_id)
        REFERENCES titles (id),
    FOREIGN KEY (department_id)
        REFERENCES departments (id)
)");

$db->exec("CREATE TABLE IF NOT EXISTS disciplines (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) UNIQUE NOT NULL,
    semester VARCHAR(10) NOT NULL,
    credits INT NOT NULL,
    teacher_id INT NOT NULL,
    CONSTRAINT ck_semester CHECK (semester IN ('Зимен' , 'Летен')),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
)");

$db->exec("CREATE TABLE IF NOT EXISTS grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    grade DECIMAL(3 , 2 ) NOT NULL,
    faculty_number INT NOT NULL,
    discipline_id INT NOT NULL,
    `date` DATE NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(10) UNIQUE NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    f_number INT UNIQUE NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id)
        REFERENCES roles (id)
)");

$db->exec("INSERT INTO roles (`name`) VALUES ('ADMIN')");
$db->exec("INSERT INTO users(f_number, `password`, role_id) VALUES (1, '1' , 1)");

echo "database created successfully!";
