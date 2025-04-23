<?php

function getTelephoneByNumber(PDO $db, $tel_number)
{
    $query = "SELECT * FROM telephones WHERE telephone_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$tel_number]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {

        return $row;
    } else {

        return null;
    }
}

function insertTelephone(PDO $db, $telephone)
{
    $query = "INSERT INTO telephones (telephone_number) VALUES (?)";
    $stmt = $db->prepare($query);

    $stmt->execute([$telephone]);

    return $db->lastInsertId();
}