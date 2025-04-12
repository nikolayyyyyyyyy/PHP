<?php
include_once "icalculate.php";
abstract class Vehicle implements Icalculate
{
    private int $year;

    protected function __construct($year)
    {
        $this->year = $year;
    }

    protected function get_year(): int
    {
        return $this->year;
    }
}
