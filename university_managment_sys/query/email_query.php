<?php

function getEmailByName(PDO $db, $email_name)
{
    $query = "SELECT * FROM emails
              WHERE email = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$email_name]);

    $email = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($email) {

        return $email;
    } else {

        return null;
    }
}

function insertEmail(PDO $db, $email_name)
{
    $query = "INSERT INTO emails (email) VALUES (?)";
    $stmt = $db->prepare($query);

    $stmt->execute([$email_name]);

    return $db->lastInsertId();
}