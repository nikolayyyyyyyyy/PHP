<?php

function getAllDisciplines(PDO $db)
{
    $stmt = $db->query("SELECT * FROM disciplines");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}