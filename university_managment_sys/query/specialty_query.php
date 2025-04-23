<?php

function getAllSpecialties(PDO $db)
{
    $query = "SELECT * FROM specialties ORDER BY specialty_id";
    $stmt = $db->query($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}