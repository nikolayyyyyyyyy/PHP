<?php
include_once "db.php";

$db->query("SET FOREIGN_KEY_CHECKS = 0");

$db->query("DELETE FROM providers
                    WHERE provider_firm = 'Орхидея'");

$db->query("SET FOREIGN_KEY_CHECKS = 1");

header("Location: delete.php");