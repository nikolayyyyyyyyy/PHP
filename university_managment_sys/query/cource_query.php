<?php

function getAllCources(PDO $db)
{
    $query = "SELECT * FROM cources ORDER BY COURCE_ID";
    $stmt = $db->query($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}