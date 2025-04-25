<?php

function getAllSpecialties(PDO $db)
{
    $query = "SELECT * FROM specialties ORDER BY specialty_id";
    $stmt = $db->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}