<?php
include_once "icalculate.php";
include_once "iparking.php";
include_once "vehicle.php";
class Parking implements Icalculate, Iparrking
{
    private int $capacity;
    private $vehicles;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->vehicles = [];
    }

    public function add_vehicle(Vehicle $vehicle)
    {
        array_push($this->vehicles, $vehicle);
    }

    public function remove_last_vehicle()
    {
        array_pop($this->vehicles);
    }

    public function calculate_tax(): int
    {
        return array_reduce($this->vehicles, function ($acc, $e) {
            return $acc += $e->calculate_tax();
        }, 1);
    }
}
