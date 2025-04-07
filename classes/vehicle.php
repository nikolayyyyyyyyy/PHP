<?php
abstract class Vehicle
{
    private int $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function get_year(): int
    {
        return $this->year;
    }

    abstract public function calculate_tax(): int;
}