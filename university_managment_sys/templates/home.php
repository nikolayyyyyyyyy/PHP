<?php
session_start();
if (isset($_SESSION['user'])) {

    if ($_SESSION['user']['role_name'] == "АДМИН") {
        ?>
        <!DOCTYPE html>
        <html lang="bg">

        <head>
            <meta charset="UTF-8">
            <title>Админ панел</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body class="bg-light">
            <div class="container mt-5">
                <h2 style="text-align: center" class="mb-4">Административен панел</h2>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="add_student.php" class="btn btn-primary">Добави студент</a>
                    <a href="add_teacher.php" class="btn btn-primary">Добави преподавател</a>
                    <a href="add_grade.php" class="btn btn-primary">Добави оценка</a>
                    <a href="all_students.php" class="btn btn-primary">Всички студенти</a>
                    <a href="teachers_by_discipline.php" class="btn btn-primary">Информация за преподаватели по дисциплина</a>
                    <a href="avg_grade_by_discipline_and_cource.php" class="btn btn-primary">Средна оценка за курс и
                        специалност</a>
                    <a href="average_grade_for_discipline.php" class="btn btn-primary">Средна оценка за дисциплина</a>
                    <a href="top_three_students_for_discipline.php" class="btn btn-primary">Топ 3 отличници по специалност
                        <a href="students_from_specialty_excellent.php" class="btn btn-primary">Студенти от специалност с над
                            5</a>
                        <a href="logout.php" class="btn btn-danger">Изход</a>
                </div>
            </div>
        </body>

        </html>
        <?php
    }
} else {
    header("Location: login.php");
    exit();
}
?>