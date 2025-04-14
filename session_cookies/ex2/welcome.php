<?php

if (isset($_COOKIE['username'])) {

    echo 'Welcome ' . $_COOKIE['username'] . '';
    echo '<br>';
    echo 'All Cookies:';
    echo '<br>';
    print_r($_COOKIE);
    echo '<br>';
} else {
    echo 'username is not set.';
    echo '<br>';
}
?>

<a href="last.php">Next page - delete cookie</a>