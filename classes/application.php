<?php
include_once "car.php";
include_once "autobus.php";
include_once "vehicle.php";
include_once "parking.php";

$audi = new Car(12, 'kombi');
echo "Audi Tax: " . $audi->calculate_tax();
echo "<br>";

$bmw = new Car(10, 'sedan');
echo "Bmw Tax: " . $bmw->calculate_tax();
echo "<br>";

$opel = new Car(5, 'cabrio');
echo "Opel Tax: " . $opel->calculate_tax();
echo "<br>";

$autobus = new Autobus(9, 100);
echo "Autobus Tax: " . $autobus->calculate_tax();
echo "<br>";

$parking = new Parking(5);

$parking->add_vehicle($audi);
$parking->add_vehicle($bmw);
$parking->add_vehicle($opel);
$parking->add_vehicle($autobus);

echo "Parking Tax: " . $parking->calculate_tax();