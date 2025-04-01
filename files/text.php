<?php

$file = fopen("data.txt", "w");
fwrite($file, "Дисциплина Web приложения се изучава през втория семестър на втори
курс. Тази дисциплина се изучава от студенти, които са специалност СИТ.");

fclose($file);

$file = fopen("data.txt", "a");
fwrite($file, "Студентите редовно си пишат домашните");
fclose($file);


echo "Size: " . filesize("data.txt");
echo "<br>";
echo "Content: " . file_get_contents("data.txt") . ".";
?>