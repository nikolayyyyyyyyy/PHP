<?php


function getUserByUsername(PDO $db, $username)
{
    $query = "SELECT u.username,u.password,r.role_name FROM users AS u
                JOIN roles AS r ON r.role_id = u.role_id
                WHERE u.username = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$username]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        return $row;
    } else {

        return null;
    }
}