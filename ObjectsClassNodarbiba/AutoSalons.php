<?php
class Vehicle
{
    public string $name;
    public int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}            

$bmw = new Vehicle('bmw', 5000);
$audi = new Vehicle('audi', 2000);
$gazik = new Vehicle('gazik', 1000);

class Store
{
    public array $inventory=[];

    public array $reserved=[];

    public function addVehicle(Vehicle $vehicle): void
    {
        $this->inventory[]=$vehicle;
    }

    public function reserveVehicle($input): void
    {
        $car = $this->inventory[$input];
        unset ($this->inventory[$input]);
        $this->reserved[] = $car;
    }

    public function buyVehicle($input):void
    {
        unset ($this->inventory[$input]);
    }

    public function getInventory(): string
    {
        $availableVehicles = "Available vehicles: ".PHP_EOL;
        foreach ($this->inventory as $index=>$vehicle) {
            $availableVehicles .= "[".$index."]".$vehicle->name." ".$vehicle->price." $".PHP_EOL;
        }
        return $availableVehicles;
    }

    public function getReservedCars(): string
    {
        if(empty($this->reserved))
        {
            return "";
        }
        else
        {
            $notAvailableVehicles = "Reserved vehicles:".PHP_EOL;
            foreach ($this->reserved as $index => $vehicle) {
                $notAvailableVehicles .= "[" . $index . "]" . $vehicle->name . " " . $vehicle->price . " $" . PHP_EOL;
            }
            return $notAvailableVehicles;
        }
    }
}

$cars = new Store();
$cars->addVehicle($bmw);
$cars->addVehicle($audi);
$cars->addVehicle($gazik);

echo "Welcome to AutoSalons car dealership!".PHP_EOL."[0] Buy a car.".PHP_EOL."[1] Reserve a car.".PHP_EOL."[Any] Leave".PHP_EOL;

$call = readline('> ');

echo $cars->getInventory().PHP_EOL;

echo $cars->getReservedCars();

switch ($call)
{
    case 0:
        $input = readline('Which car do you desire?> ');
        echo PHP_EOL;
        $cars->buyVehicle($input);
        echo $cars->getInventory().PHP_EOL;
        break;
    case 1:
        $input = readline('Which car do you desire?> ');
        echo PHP_EOL;
        $cars->reserveVehicle($input);
        echo $cars->getInventory().PHP_EOL;
        echo $cars->getReservedCars();
        break;
    default:
        exit;
}