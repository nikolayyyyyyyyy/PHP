<?php
include_once "vehicle.php";
interface Iparrking
{
    public function remove_last_vehicle();
    public function add_vehicle(Vehicle $vehicle);
}