create table if not exists cources(
	id int primary key auto_increment,
    `number` char(1) not null
);

create table if not exists specialties(
	id int primary key auto_increment,
    `name` varchar(20) unique not null
);

create table if not exists students(
	id int primary key auto_increment,
    faculty_number int unique not null,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) unique not null,
    address varchar(150) unique not null,
    specialty_id int not null,
    cource_id int not null,
    foreign key (specialty_id) references specialties(id),
    foreign key (cource_id) references cources(id)
);

create table if not exists titles(
	id int primary key auto_increment,
    `name` varchar(10) unique not null
);

create table if not exists departments(
	id int primary key auto_increment,
    `name` varchar(50) unique not null
);

create table if not exists teachers(
	id int primary key auto_increment,
    telephone_number char(10) unique not null,
    email varchar(50) unique not null,
    title_id int not null,
    department_id int not null,
    constraint ck_telephone_teacher check (length(telephone_number) = 10),
    foreign key (title_id) references titles(id),
    foreign key (department_id) references departments(id)
);

create table if not exists disciplines(
	id int primary key auto_increment,
    `name` varchar(50) unique not null,
    semester varchar(10) not null,
    credits int not null,
	constraint ck_semester check (semester in ('Зимен','Летен'))
);

create table if not exists teachers_disciplines(
	teacher_id int not null,
    discipline_id int not null,
    foreign key (teacher_id) references reachers(id),
    foreign key (discipline_id) references disciplines(id)
);

create table if not exists grades(
	id int primary key auto_increment,
    grade decimal(3,2) not null,
    student_id int not null,
    discipline_id int not null,
    `date` date not null
);
