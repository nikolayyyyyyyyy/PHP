<?php
$file = fopen("array.txt", "w");

fwrite($file, "10, 35, 30, 44, 55, 14, 73");

include "functions.php";
readArrayFromFile("array.txt");