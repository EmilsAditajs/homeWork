<?php

$player = new stdClass();
$player->name = "Peteris";
$player->cash = 100;

$cashLeft = $player->cash;

$symbols = [' A ', ' B ', ' C '];

$symbolValue = [1, 2, 3];

$boardRows = 3;

$boardColumns = 3;

$board = [];

$combinations = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [0, 2], [1, 1], [2, 0]
    ]
];

function display($board)
{
    foreach ($board as $row) {
        foreach ($row as $column) {
            echo $column;
        }
        echo PHP_EOL;
    }
}

function game($combinations, $board, $symbolValue, $symbols, $bet, $cashLeft)
{
    for ($a = 0; $a < count($combinations); $a++) {
        $newArray = [];
        $payOut = 0;
        global $cashLeft;

        for ($b = 0; $b < count($combinations[$a]); $b++) {
            [$c, $d] = $combinations[$a][$b];
            $newArray[] = $board[$c][$d];
            $payOut = ($symbolValue[array_search($board[$c][$d], $symbols)] * $bet);
        }

        if (count(array_unique($newArray)) === 1) {
            echo "Line " . ($a + 1) . " wins! Payout is " . $payOut . " credits." . PHP_EOL . PHP_EOL;
            $cashLeft += $payOut;
        }
    }
}

echo $player->name . " has " . $cashLeft . " credits." . PHP_EOL . PHP_EOL;

echo "A pays 1 credit." . PHP_EOL . "B pays 2 credits." . PHP_EOL . "C pays 3 credits." . PHP_EOL . PHP_EOL;

$game = readline('Do you want to play a game (y/n)? ');
echo PHP_EOL;

if ($game !== "y") {
    exit;
}

$bet = (int)readline("Enter your bet: ");
echo PHP_EOL;

if ($bet > $cashLeft) {
    echo "You dont have enough credits!!!" . PHP_EOL;
    $bet = (int)readline("Enter your bet: ");
    echo PHP_EOL;
}

for ($x = 0; $x < $boardRows; $x++) {
    for ($y = 0; $y < $boardColumns; $y++) {
        {
            $board[$x][$y] = $symbols[array_rand($symbols)];
        }
    }
}

display($board);
echo PHP_EOL;

game($combinations, $board, $symbolValue, $symbols, $bet, $cashLeft);

$cashLeft -= $bet;

echo $player->name . " has " . $cashLeft . " credits left." . PHP_EOL . PHP_EOL;

if ($cashLeft <= 0) {
    echo "You ran out of cash, go to the bank!!!" . PHP_EOL;
    exit;
}

while (true) {
    $playAgain = readLine("Do you want to play again? (y/n) ");

    switch ($playAgain) {
        case 'y':
            $bet = (int)readline("Enter your bet: ");
            echo PHP_EOL;

            if ($bet > $cashLeft) {
                echo "You dont have enough credits!!!" . PHP_EOL;
                $bet = (int)readline("Enter your bet: ");
            }

            echo PHP_EOL;

            for ($x = 0; $x < $boardRows; $x++) {
                for ($y = 0; $y < $boardColumns; $y++) {
                    {
                        $board[$x][$y] = $symbols[array_rand($symbols)];
                    }
                }
            }

            display($board);
            echo PHP_EOL;

            game($combinations, $board, $symbolValue, $symbols, $bet, $cashLeft);

            $cashLeft -= $bet;

            echo $player->name . " has " . $cashLeft . " credits." . PHP_EOL . PHP_EOL;

            if ($cashLeft <= 0) {
                echo "You ran out of cash, go to the bank!!!" . PHP_EOL;
                exit;
            }
            break;
        default:
            echo "You have left the game with " . $cashLeft . " credits. BB!" . PHP_EOL;
            exit;
    }
}


