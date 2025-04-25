<?php

function getAllTitles(PDO $db)
{
    $query = "SELECT * FROM titles ORDER BY title_id";
    $stmt = $db->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}