<?php

$person = new stdClass();
$person -> name = "Peteris";
$person -> cash = 1000;
$person -> licenses = ["A", "B"];

function createWeapon(string $name, int $price, string $license = null): stdClass
{
    $weapon = new stdClass();
    $weapon -> name = $name;
    $weapon -> license = $license;
    $weapon -> price = $price;
    return $weapon;
}

$weapons = [
    createWeapon('Ak47', 1000, 'C'),
    createWeapon('Deagle', 500, 'A'),
    createWeapon('Knife', 100),
    createWeapon('Glock', 250, 'A'),
];

echo "{$person->name} has {$person -> cash}$" . PHP_EOL;

$basket = [];

foreach ($weapons as $index => $weapon)
{
    echo "[{$index}] {$weapon -> name} {$weapon -> license} {$weapon -> price}" . PHP_EOL;
}

$selectedWeaponIndex = (int) readline("Select weapon:");

$weapon = $weapons[$selectedWeaponIndex] ?? null;

if ($weapon === null)
{
    echo "Weapon not found." . PHP_EOL;
    exit;
}

if ($weapon -> license !== null && !in_array($weapon -> license, $person -> licenses))
{
      echo "Invalid license" . PHP_EOL;
      exit;
}

if ($person -> cash < $weapon -> price)
{
    echo "Insufficient funds" . PHP_EOL;
    exit;
}

$basket[] = $weapon;

while (true)
{
    echo "[1] Purchase some more weapons" . PHP_EOL . "[2] Checkout." . PHP_EOL . "[any] Exit" . PHP_EOL;
    $option = (int) readline ("Select an option:");

    switch ($option)
    {
        case 1:
            foreach ($weapons as $index => $weapon)
            {
                echo "[{$index}] {$weapon -> name} {$weapon -> license} {$weapon -> price}" . PHP_EOL;
            }

            $selectedWeaponIndex = (int) readline("Select weapon:");

            $weapon = $weapons[$selectedWeaponIndex] ?? null;

            if ($weapon === null)
            {
                echo "Weapon not found." . PHP_EOL;
                exit;
            }

            if ($weapon -> license !== null && !in_array($weapon -> license, $person -> licenses))
            {
                echo "Invalid license" . PHP_EOL;
                exit;
            }


            $basket [] = $weapon;

            echo "Added " . $weapon -> name . " to the basket" . PHP_EOL;

            break;
        case 2:
            $totalSum = 0;
            foreach ($basket as $item) {
                $totalSum += $item -> price;
                echo $item->name . PHP_EOL;
            }
            echo "________________" . PHP_EOL;
            echo "Total: " .  $totalSum . PHP_EOL;
            if ($totalSum <= $person -> cash)
            {
                echo "Successful payment" . PHP_EOL;
            }
            else
            {
                echo "Insufficient funds." . PHP_EOL;
            }
            exit;
        default:
            exit;

    }
}