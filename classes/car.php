<?php
include_once "vehicle.php";

class Car extends Vehicle
{
    private string $type;

    public function __construct($year, $type)
    {
        parent::__construct($year);
        $this->set_type($type);
    }

    public function get_type(): string
    {
        return $this->type;
    }

    private function set_type($type): void
    {
        if ($type !== "kombi" && $type !== "sedan" && $type !== "cabrio") {
            throw new Exception("Invalid type of car");
        }
        $this->type = $type;
    }

    public function calculate_tax(): int
    {
        if ($this->type === "kombi") {

            return parent::get_year() * 3;
        } else {

            return parent::get_year() * 2;
        }
    }
}