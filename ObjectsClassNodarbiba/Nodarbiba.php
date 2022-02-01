<?php

class Weapon
{
    public string $name;
    public string $power;

    public function __construct(string $name, int $power)
    {
        $this->name = $name;
        $this->power = $power;
    }
}

$gun = new Weapon('Shooter',9001);
$sword = new Weapon('Choppa',2);

class Inventory
{
    public array $inventory = [];

    public function addWeapon(Weapon $weapon):void
    {
        $this -> inventory[] = $weapon;
    }

    public function extractWeaponInfo():string
    {
        $info = '';
        foreach ($this->inventory as $weapon) {
            $info .= $weapon->name . " " . $weapon->power . PHP_EOL;
        }
        return $info;
    }
}

$shelf = new Inventory();
$shelf->addWeapon($gun);
$shelf->addWeapon($sword);

echo $shelf->extractWeaponInfo();
