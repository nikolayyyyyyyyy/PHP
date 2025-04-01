<?php
$target_file = "upload/" . basename($_FILES["choose"]["name"]);

$fileType = ($_FILES['choose']['type']);
$fileSize = $_FILES['choose']['size'];
$maxSize = 200000;
$possible = ["image/png", "image/jpg", "image/jpeg", "text/plain"];

if (
    !in_array($fileType, $possible) ||
    $fileSize > $maxSize
) {
    echo "File too large or unsupported file type.";
    return;
}

move_uploaded_file($_FILES["choose"]["tmp_name"], $target_file);
