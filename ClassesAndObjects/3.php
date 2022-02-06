<?php


class FuelGauge
{
    private float $fuel = 0;
    private const FUEL_CAPACITY = 70;

    public function __construct(float $amount)
    {
        $this->change($amount);
    }

    public function change(float $amount): void
    {
        $this->fuel += $amount;

        if ($this->fuel > self::FUEL_CAPACITY) {
            $this->fuel = self::FUEL_CAPACITY;
        }

        if ($this->fuel < 0) {
            $this->fuel = 0;
        }
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }
}

class Odometer
{
    private int $mileage = 0;

    public function getMileage()
    {
        return $this->mileage;
    }

    public function addMileage(int $amount)
    {
        $this->mileage += $amount;
    }
}

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km

    public function __construct(string $name, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }
}

$name = readline('Car name: ');
$fuelGaugeAmount = (int) readline('Fuel Gauge amount: ');
$driveDistance = (int) readline('Drive distance: ');

$car = new Car($name, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

while ($car->getFuel() > 0) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;

    $car->drive($driveDistance);

    sleep(1);
}

