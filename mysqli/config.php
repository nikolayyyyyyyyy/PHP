<?php

$db = mysqli_connect(
    'localhost',
    'root',
    ''
);

mysqli_select_db($db, 'info_books');
