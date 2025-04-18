CREATE DATABASE IF NOT EXISTS university_managment_sys;

USE university_managment_sys;

CREATE TABLE IF NOT EXISTS telephones (
    telephone_id INT PRIMARY KEY AUTO_INCREMENT,
    telephone_number VARCHAR(10) UNIQUE NOT NULL,
    CONSTRAINT telephone_number_ck CHECK (LENGTH(telephone_number) = 10)
);

CREATE TABLE IF NOT EXISTS departments (
    department_id INT PRIMARY KEY AUTO_INCREMENT,
    department_name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS titles (
    title_id INT PRIMARY KEY AUTO_INCREMENT,
    title_name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS semesters (
    semester_id INT PRIMARY KEY AUTO_INCREMENT,
    semester_name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS addresses (
    address_id INT PRIMARY KEY AUTO_INCREMENT,
    address VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS emails (
    email_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS cources (
    cource_id INT PRIMARY KEY AUTO_INCREMENT,
    cource_name VARCHAR(10) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS specialties (
    specialty_id INT PRIMARY KEY AUTO_INCREMENT,
    specialty_name VARCHAR(10) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    faculty_number INT UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    egn INT UNIQUE NOT NULL,
    cource_id INT NOT NULL,
    specialty_id INT NOT NULL,
    address_id INT NOT NULL,
    email_id INT NOT NULL,
    FOREIGN KEY (cource_id)
        REFERENCES cources (cource_id),
    FOREIGN KEY (specialty_id)
        REFERENCES specialties (specialty_id),
    FOREIGN KEY (address_id)
        REFERENCES addresses (address_id),
    FOREIGN KEY (email_id)
        REFERENCES emails (email_id)
);

CREATE TABLE IF NOT EXISTS teachers (
    teacher_id INT PRIMARY KEY AUTO_INCREMENT,
    teacher_number INT UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    title_id INT NOT NULL,
    telephone_id INT NOT NULL,
    department_id INT NOT NULL,
    email_id INT NOT NULL,
    FOREIGN KEY (email_id)
        REFERENCES emails (email_id),
    FOREIGN KEY (title_id)
        REFERENCES titles (title_id),
    FOREIGN KEY (telephone_id)
        REFERENCES telephones (telephone_id),
    FOREIGN KEY (department_id)
        REFERENCES departments (department_id)
);

CREATE TABLE IF NOT EXISTS disciplines (
    discipline_id INT PRIMARY KEY AUTO_INCREMENT,
    discipline_name VARCHAR(10) UNIQUE NOT NULL,
    credits INT NOT NULL,
    semester_id INT NOT NULL,
    FOREIGN KEY (semester_id)
        REFERENCES semesters (semester_id)
);

CREATE TABLE IF NOT EXISTS teachers_disciplines (
    teacher_id INT NOT NULL,
    discipline_id INT NOT NULL,
    FOREIGN KEY (teacher_id)
        REFERENCES teachers (teacher_id),
    FOREIGN KEY (discipline_id)
        REFERENCES disciplines (discipline_id)
);

CREATE TABLE IF NOT EXISTS grades (
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    grade DECIMAL(3 , 2 ) NOT NULL,
    `date` DATE NOT NULL,
    discipline_id INT NOT NULL,
    FOREIGN KEY (discipline_id)
        REFERENCES disciplines (discipline_id)
);

CREATE TABLE students_grades (
    student_id INT NOT NULL,
    grade_id INT NOT NULL,
    FOREIGN KEY (student_id)
        REFERENCES students (student_id),
    FOREIGN KEY (grade_id)
        REFERENCES grades (grade_id)
);

CREATE TABLE roles (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(10) UNIQUE NOT NULL
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    email_id INT NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (email_id)
        REFERENCES emails (email_id),
    FOREIGN KEY (role_id)
        REFERENCES roles (role_id)
);

INSERT INTO departments(department_name) VALUES ('МАШИННО- ТЕХНОЛОГИЧЕН ФАКУЛТЕТ');
INSERT INTO departments(department_name) VALUES ('ФАКУЛТЕТ ПО ИЗЧИСЛИТЕЛНА ТЕХНИКА И АВТОМАТИЗАЦИЯ');
INSERT INTO departments(department_name) VALUES ('ЕЛЕКТРОТЕХНИЧЕСКИ ФАКУЛТЕТ');
INSERT INTO departments(department_name) VALUES ('КОРАБОСТРОИТЕЛЕН ФАКУЛТЕТ');

INSERT INTO titles (title_name) VALUES ('асистент');
INSERT INTO titles (title_name) VALUES ('главен асистент');
INSERT INTO titles (title_name) VALUES ('преподавател');
INSERT INTO titles (title_name) VALUES ('старши преподавател');
INSERT INTO titles (title_name) VALUES ('доцент');
INSERT INTO titles (title_name) VALUES ('професор');

INSERT INTO semesters (semester_name) VALUES ('летен');
INSERT INTO semesters (semester_name) VALUES ('зимен');

INSERT INTO cources (cource_name) VALUES ('Първи');
INSERT INTO cources (cource_name) VALUES ('Втори');
INSERT INTO cources (cource_name) VALUES ('Трети');
INSERT INTO cources (cource_name) VALUES ('Четвътри');
INSERT INTO cources (cource_name) VALUES ('Пети');

INSERT INTO specialties(specialty_name) VALUES ('КСТ');
INSERT INTO specialties(specialty_name) VALUES ('СИТ');
INSERT INTO specialties(specialty_name) VALUES ('Киберсигутност');
INSERT INTO specialties(specialty_name) VALUES ('Изкуствен Интелект');
INSERT INTO specialties(specialty_name) VALUES ('Корабоводене');

INSERT INTO disciplines (discipline_name, credits , semester_id)
	VALUES ('Уеб програмиране', 100, 2);
INSERT INTO disciplines (discipline_name, credits , semester_id)
	VALUES ('ООП 2-ра част', 100, 2);
INSERT INTO disciplines (discipline_name, credits , semester_id)
	VALUES ('ООП 1-ва част', 100, 1);
INSERT INTO disciplines (discipline_name, credits , semester_id)
	VALUES ('Бази от данни', 100, 1);
INSERT INTO disciplines (discipline_name, credits , semester_id)
	VALUES ('Програмни системи', 80, 2);
    
INSERT INTO roles (role_name) VALUES ('АДМИН');
INSERT INTO roles (role_name) VALUES ('ПОТРЕБИТЕЛ');
