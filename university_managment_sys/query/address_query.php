<?php

function getAddressByAddressName(PDO $db, $address_name)
{
    $query = "SELECT * FROM addresses
              WHERE address = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$address_name]);

    $address = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($address) {

        return $address;
    } else {

        return null;
    }
}

function insertAddress(PDO $db, $address_name)
{
    $query = "INSERT INTO addresses (`address`) VALUES (?)";
    $stmt = $db->prepare($query);

    $stmt->execute([$address_name]);

    return $db->lastInsertId();
}
