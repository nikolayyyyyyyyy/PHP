<?php
session_start();
if (isset($_POST['answer3'])) {
    $_SESSION['answer3'] = $_POST['answer3'];
}

$correct = [
    'answer1' => 'Paris',
    'answer2' => '4',
    'answer3' => 'PHP'
];

$score = 0;
foreach ($correct as $key => $value) {
    if (isset($_SESSION[$key]) && $_SESSION[$key] == $value) {
        $score++;
    }
}

echo "<h1>Your total score: $score / 3</h1>";