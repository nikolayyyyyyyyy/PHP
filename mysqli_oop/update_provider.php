<?php
include_once "db.php";

$db->query("UPDATE providers
	                SET person_to_contact = 'Мария Руменова'
                    WHERE provider_firm = 'Лазур'");

header("Location: update.php");