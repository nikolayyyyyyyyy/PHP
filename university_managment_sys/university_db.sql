create database if not exists university_managment_sys;

use university_managment_sys;

create table if not exists telephones(
	telephone_id int primary key auto_increment,
    telephone_number varchar(10) unique not null,
    constraint telephone_number_ck check (length(telephone_number) = 10)
);

create table if not exists departments(
	department_id int primary key auto_increment,
    department_name varchar(50) unique not null
);

create table if not exists titles(
	title_id int primary key auto_increment,
    title_name varchar(50) unique not null
);

create table if not exists semesters(
	semester_id int primary key auto_increment,
    semester_name varchar(100) unique not null
);

create table if not exists addresses(
	address_id int primary key auto_increment,
    address varchar(100) unique not null
);

create table if not exists emails(
	email_id int primary key auto_increment,
    email varchar(100) unique not null
);

create table if not exists cources(
	cource_id int primary key auto_increment,
    cource_name varchar(10) unique not null
);

create table if not exists specialties(
	specialty_id int primary key auto_increment,
    specialty_name varchar(10) unique not null
);

create table if not exists students(
	student_id int primary key auto_increment,
    faculty_number int unique not null,
    first_name varchar(50) not null,
    middle_name varchar(50) not null,
    last_name varchar(50) not null,
    cource_id int not null,
    specialty_id int not null,
    address_id int not null,
    email_id int not null,
    foreign key (cource_id) references cources(id),
    foreign key (specialty_id) references specialties(id),
	foreign key (address_id) references addresses(id),
    foreign key (email_id) references emails(id)
);

create table if not exists teachers (
	teacher_id int primary key auto_increment,
    teacher_number int unique not null,
	first_name varchar(50) not null,
    middle_name varchar(50) not null,
    last_name varchar(50) not null,
    title_id int not null,
    telephone_id int not null,
    department_id int not null,
    email_id int not null,
    foreign key (email_id) references emails(id),
    foreign key (title_id) references titles(id),
    foreign key (telephone_id) references telephones(id),
    foreign key (department_id) references departments(id)
);

create table if not exists disciplines(
	discipline_id int primary key auto_increment,
    discipline_name varchar(10) unique not null,
    creadits int not null,
    semester_id int not null,
    foreign key (semester_id) references semesters(id)
);

create table if not exists teachers_disciplines(
	teacher_id int not null,
    discipline_id int not null,
    foreign key (teacher_id) references teachers(id),
    foreign key (discipline_id) references disciplines(id)
);

create table if not exists grades(
	grade_id int primary key auto_increment,
    grade decimal(3,2) not null,
    `date` date not null,
    discipline_id int not null,
    foreign key (discipline_id) references disciplines(id)
);

create  table students_grades(
	student_id int not null,
    grade_id int not null,
    foreign key (student_id) references students(id),
    foreign key (grade_id) references grades(id)
);

create table roles (
	role_id int primary key auto_increment,
    role_name varchar(10) unique not null
);

create table users(
	user_id int primary key auto_increment,
    email_id int not null,
    `password` varchar(100) not null,
    foreign key (email_id) references emails(id),
    foreign key (role_id) references roles(id)
);
