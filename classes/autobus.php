<?php
include_once "vehicle.php";

class Autobus extends Vehicle
{
    private int $count_seats;

    public function __construct($year, $count_seats)
    {
        parent::__construct($year);
        $this->count_seats = $count_seats;
    }

    public function calculate_tax(): int
    {
        return parent::get_year() * $this->count_seats;
    }
}