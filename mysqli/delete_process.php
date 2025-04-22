<?php
include_once "config.php";
$query = "delete from books 
          where publisher = 'Просвета'";

mysqli_query($db, $query);

header("Location: delete.php");