<?php

// TicTacToe


$infoFromTxtFile = explode ('
', file_get_contents('5.1.uzd.txt'));

$boardSize = explode (' ', $infoFromTxtFile[0]);

array_shift ($boardSize);

$boardSize = explode ('x', $boardSize[0]);

$boardRows = (int) $boardSize[0];

$boardColumns = (int) $boardSize[1];

$board = [];

for ($x = 0; $x < $boardRows; $x++)
    for ($y = 0; $y < $boardColumns; $y++)
    {
        {
            $board[$x][$y] = ' - ';
        }
    }

$combinationsInTxt = explode (' ', $infoFromTxtFile[1]);

array_shift ($combinationsInTxt);

$combinations = explode('|', $combinationsInTxt[0]);

for ($c = 0; $c < count($combinations); $c++) {
    $combinations[$c] = explode(';', $combinations[$c]);
    for ($b = 0; $b < count($combinations[$c]); $b++) {
        $combinations[$c][$b] = explode(',', $combinations[$c][$b]);
    }
}


$player1Input = readline('Player one, choose your character: ');
$player2Input = readline('Player two, choose your character: ');

$player1 = " " . $player1Input . " ";
$player2 = " " . $player2Input . " ";

$activePlayer = $player1;
function showBoard (array $board)
{
    foreach ($board as $row)
    {
        foreach ($row as $column)
        {
            echo $column;
        }
        echo PHP_EOL;
    }
}

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer)
            {
                break;
            }
            if (end($combination) === $item)
            {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array(' - ', $row)) return false;
    }
    return true;
}


while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer))
{
    showBoard($board);
    echo $activePlayer;
    $position = readline(' - enter position (row, column): ');

    [$row, $column] = explode(',', $position);

    if ($board[$row][$column] !== ' - ') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
    {
        echo 'Winner is ' . $activePlayer;
        echo "Congratulations!!!";
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;

















































































































































