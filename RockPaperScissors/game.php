<?php

function createWeapon($name, $beats, $beatsAlso): stdClass
{
    $weapon = new stdClass();
    $weapon -> name = $name;
    $weapon -> beats = [$beats, $beatsAlso];
    return $weapon;
}

$weapons = [];

$row = 1;
if(($handle = fopen('gameInfo.csv', 'r')) !== false)
{
    while (($data = fgetcsv($handle, 1000, ",")) !== false)
    {
        [$name, $beats, $beatsAlso] = $data;
        $weapons[] = createWeapon( $name, $beats, $beatsAlso);
    }
    fclose($handle);
}

foreach ($weapons as $weapon)
{
    echo "[" . array_search($weapon, $weapons) . "] {$weapon -> name} beats {$weapon -> beats[0]} and {$weapon -> beats[1]}" . PHP_EOL;
}

echo PHP_EOL . PHP_EOL;

$playerWeaponIndex = readline ('Player, choose your weapon: ');

$playerWeapon = $weapons[$playerWeaponIndex];

$computerWeapon = $weapons[array_rand($weapons)];

$gameLog = [];

$gameLog = explode (',', file_get_contents('gameLog.txt'));

echo PHP_EOL . "Computer chose " . $computerWeapon -> name . PHP_EOL . PHP_EOL;

if (in_array($computerWeapon -> name, $playerWeapon -> beats))
{
    echo $playerWeapon -> name . " beats " . $computerWeapon -> name . ". Player wins!!!!" . PHP_EOL . PHP_EOL;
    $gameLog[] = "Player won " . PHP_EOL;
}
elseif (in_array($playerWeapon -> name, $computerWeapon -> beats))
{
    echo $computerWeapon -> name . " beats " . $playerWeapon -> name . ". Computer wins!!!" . PHP_EOL . PHP_EOL;
    $gameLog[] = "Computer won " . PHP_EOL;
}
else
{
    echo "It`s a draw!!!" . PHP_EOL . PHP_EOL;
    $gameLog[] = "Draw " . PHP_EOL;
}


$logLog = implode(',', $gameLog);
file_put_contents('gameLog.txt', $logLog);

$seeLog = readLine('Would you like to see the game log(y/n)? ');

if($seeLog == "y")
{
    echo file_get_contents('gameLog.txt') . PHP_EOL;
}
else
{
    exit;
}


