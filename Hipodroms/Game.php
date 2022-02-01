<?php

$trackLength = 20;

function createHorse(string $name, int $position): stdClass
{
    $horse = new stdClass();
    $horse->name = $name;
    $horse->position = $position;
    return $horse;
}

$horses = [
    createHorse('A', 0),
    createHorse('B', 0),
    createHorse('C', 0),
    createHorse('D', 0)
];

$horseNames = [];

foreach ($horses as $horse)
{
    $horseNames[] = $horse -> name;
}

$track = [];

$winnerBoard = [];

global $winnerBoard;

for ($x = 0; $x < $trackLength; $x++) {
    $track[] = '_';
}

function positions($horses, $track)
{
    foreach ($horses as $horse) {
        $track[0] = $horse->name;
        foreach ($track as $line) {
            echo $line;
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;
    sleep(1);
}

function finished(array $horses, int $trackLength): bool
{
    for ($y = 0; $y < count($horses); $y++) {
        if ($horses[$y]->position <= ($trackLength - 1)) {
            return true;
        }
    }
    return false;
}

function moveHorse($track, $horses, $trackLength, $z)
{
    $step = rand(1,2);
    if (isset($track[$horses[$z]->position + $step]) || $horses[$z]->position >= ($trackLength - 1)) {
        $track[$horses[$z]->position + $step] = $horses[$z]->name;
        $horses[$z]->position = array_search($horses[$z]->name, $track);
        foreach ($track as $step) {
            echo $step;
        }
        echo PHP_EOL;
    } else {
        $track[$trackLength - 1] = $horses[$z]->name;
        foreach ($track as $step) {
            echo $step;
        }
        echo PHP_EOL;
    }
}

function alreadyFinished(array $winnerBoard, array $horses, int $z): bool
{
    foreach ($winnerBoard as $smallerBoard) {
        if (in_array($horses[$z]->name, explode('.', $smallerBoard))) {
            return true;
        }
    }
    return false;
}

$play = readline ('Do you want to win some money?? (y/n) ');

if ($play !== 'y')
{
    echo "Okk :(" . PHP_EOL;
    exit;
}

$bet =(int) readline ('Enter your bet: ');

$luckyHorse = readline ('Which horse will be the lucky one(A, B, C, D)? ');

if(!in_array($luckyHorse, $horseNames))
{
    echo "Invalid horse name, try again!" . PHP_EOL;
    $luckyHorse = readline ('Which horse will be the lucky one(A, B, C, D)? ');
}

positions($horses, $track);

$counter = 0;
while (finished($horses, $trackLength)) {
    for ($z = 0; $z < count($horses); $z++) {
        moveHorse($track, $horses, $trackLength, $z);

        foreach ($winnerBoard as $winner) {
            $explodedBoard[] = explode('.', $winner);
        }

        if ($horses[$z]->position > ($trackLength - 1) && !alreadyFinished($winnerBoard, $horses, $z)) {
            $winnerBoard[] = $horses[$z]->name . "." . $counter;
        }
    }
    echo PHP_EOL;

    $counter++;

    sleep(1);
}

echo PHP_EOL;
$winner = [];

$winner[] = substr($winnerBoard[0], 0, 1);

for($o = 1; $o < count($winnerBoard); $o++)
{
    if(substr($winnerBoard[$o], -1) == substr($winnerBoard[0], -1))
    {
        $winner[] = substr($winnerBoard[$o], 0, 1);
    }
}

foreach ($winner as $win)
{
    echo $win . " ";
}
echo "wins!" . PHP_EOL;

if (in_array($luckyHorse, $winner))
{
    echo "Congratulations, you have won " . $bet * 100 . " credits!!!" . PHP_EOL;
}
else
{
    echo "Sorry, you are unlucky ;(" . PHP_EOL;
}
