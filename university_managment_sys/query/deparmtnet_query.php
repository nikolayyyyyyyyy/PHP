<?php

function getAllDepartmnets(PDO $db)
{
    $query = "SELECT * FROM departments ORDER BY department_id";
    $stmt = $db->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}