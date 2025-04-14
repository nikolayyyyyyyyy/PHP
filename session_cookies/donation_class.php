<?php
class Donation
{
    private $name;
    private $amount;
    private static $totalDonated;
    private static $numberOfDonors;

    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
        self::$numberOfDonors++;
        self::$totalDonated += $amount;
    }

    public static function get_count_donors(): string
    {
        return "Number of Donors: " . self::$numberOfDonors;
    }

    public static function get_total_donation(): string
    {
        return "Total Donation: " . self::$totalDonated;
    }

    public function info(): string
    {
        return $this->name . " donated " . $this->amount . " (" . round(($this->amount / self::$totalDonated) * 100, 2) . ")";
    }
}

$first = new Donation("Nikolay", 85);
$second = new Donation("Mitko", 50);
$third = new Donation("Emily", 90);
$fourth = new Donation("Iliana", 65);

echo $first->info();
echo "<br>";
echo $second->info();
echo "<br>";
echo $third->info();
echo "<br>";
echo $fourth->info();
echo "<br>";

echo Donation::get_total_donation();
echo "<br>";
echo Donation::get_count_donors();
