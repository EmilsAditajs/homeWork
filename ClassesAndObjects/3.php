<?php

class FuelGauge
{
    protected int $fuelAmount;

    public function __construct($fuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
    }

    public function getFuel(): int
    {
        return $this->fuelAmount;
    }

    public function incrementFuel(): int
    {
        if ($this->fuelAmount < 70) {
            return $this->fuelAmount++;
        }
        return $this->fuelAmount;
    }

    public function decrementFuel(): int
    {
        if ($this->fuelAmount > 0) {
            return $this->fuelAmount--;
        }
        return $this->fuelAmount;
    }
}

class Odometer
{
    public int $mileage;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): int
    {
        if ($this->mileage < 999999) {
            $this->mileage++;
        } else {
            $this->mileage = 0;
        }
        return $this->mileage;
    }


}

Class Tires
{
    public string $name;
    public int $thickness;
    public int $wearFactor;

    public function __construct($name, $thickness)
    {
       $this->name = $name;
       $this->thickness = $thickness;
       $this->wearFactor = rand(1,9)/10;
    }

    public function destroyTires()
    {
        $this->thickness -= $this->wearFactor;
    }

    public function getTireThickness()
    {
        return $this->thickness;
    }

    public function getName()
    {
        return $this->name;
    }
}

Class Car
{
    public string $name;
    public array $tires = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addTire($tire)
    {
        $this->tires[] = $tire;
    }

    public function drive(object $carFuel, object $carMileage)
    {
        $carMileage->incrementMileage();
        if ($carMileage->mileage % 10 == 0) {
            $carFuel->decrementFuel();
            foreach($this->tires as $tire)
            {
                $tire->destroyTires();
            }
        }
    }
}

$carFuel = new FuelGauge(0);
$carMileage = new Odometer(0);
$goodCar = new Car('Emils');
$tire1 = new Tires('tire1', 10);
$goodCar->addTire($tire1);
$tire2 = new Tires('tire2', 10);
$goodCar->addTire($tire2);
$tire3 = new Tires('tire3', 10);
$goodCar->addTire($tire3);
$tire4 = new Tires('tire4', 10);
$goodCar->addTire($tire4);

$fuel = readline('Enter fuel l: ');
for($y=0; $y<$fuel; $y++) {
    $carFuel->incrementFuel();
    echo $carFuel->getFuel() . " l" . PHP_EOL;
    sleep(1);
}
echo "Fuel tank filled" . PHP_EOL;

$km =(int) readline('Enter km: ');
echo $carMileage->getMileage() . " km" . PHP_EOL;
echo $carFuel->getFuel() . " l" . PHP_EOL . PHP_EOL;

for($x=0; $x<$km; $x++) {
    $goodCar->drive($carFuel, $carMileage);
    echo $carMileage->getMileage() . " km" . PHP_EOL;
    echo $carFuel->getFuel() . " l" . PHP_EOL . PHP_EOL;
    foreach($goodCar->tires as $tire)
    {
        if($tire->thickness <= 0)
        {
            echo $tire->getName() .  ' exploded, you died' . PHP_EOL;
        }
        echo $tire->getName() . " is " . $tire->getTireThickness() . " thick" . PHP_EOL;
    }

    if($carFuel->getFuel() == 0)
    {
        echo "Out of fuel." . PHP_EOL;
        exit;
    }
    sleep(1);
}


