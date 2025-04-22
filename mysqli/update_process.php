<?php
include_once "config.php";
$query = "update books 
            set publisher = 'Просвета'
            where publisher = 'Анубис'";

mysqli_query($db,$query);

header("Location: update.php");