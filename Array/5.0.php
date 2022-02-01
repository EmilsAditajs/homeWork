<?php

$board = [
    [' - ',' - ',' - '],
    [' - ',' - ',' - '],
    [' - ',' - ',' - '],
];

function display_board($board)
{
    foreach($board as $row)
    {
        foreach($row as $column)
        {
            echo $column;
        }
        echo PHP_EOL;
    }
};

$playerOne = readline('Player one, pick your character: ');
$playerTwo = readline('Player two, pick your character: ');

echo display_board($board);

for($i=1;$i<=9;$i++)
{
    if ($board[0][0] == $board[0][1] && $board[0][1] == $board[0][2] && $board[0][0]!==' - ') {
        echo "Player " . $board[0][0] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[1][0] == $board[1][1] && $board[1][1] == $board[1][2] && $board[1][0] !==' - ') {
        echo "Player " . $board[1][0] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[2][0] == $board[2][1] && $board[2][1] == $board[2][2] && $board[2][0] !==' - ') {
        echo "Player " . $board[2][0] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[0][0] == $board[1][0] && $board[1][0] == $board[2][0] && $board[0][0] !==' - ') {
        echo "Player " . $board[0][0] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[0][1] == $board[1][1] && $board[1][1] == $board[2][1] && $board[0][1] !==' - ') {
        echo "Player " . $board[0][1] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[0][2] == $board[1][2] && $board[1][2] == $board[2][2]&&$board[0][2]!==' - ') {
        echo "Player " . $board[0][2] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[0][0] == $board[1][1] && $board[1][1] == $board[2][2]&&$board[0][0]!==' - ') {
        echo "Player " . $board[0][0] . " wins!!!" . PHP_EOL;
        exit;
    }
    if ($board[0][2] == $board[1][1] && $board[1][1] == $board[2][0]&&$board[0][2]!==' - ') {
        echo "Player " . $board[0][0] . " wins!!!" . PHP_EOL;
        exit;
    }

    if ($i % 2 == 0) {
        echo $playerOne . ", choose your location" . PHP_EOL;
        $z = readline('enter row ') . PHP_EOL;
        $y = readline('enter column ') . PHP_EOL;
        if ($board[(int)$z][(int)$y] == " " . $playerOne . " " || $board[(int)$z][(int)$y] == " " . $playerTwo . " ") {
            echo "Already full space" . PHP_EOL;
            $i--;
        } else
        {
            $board[(int)$z][(int)$y] = " " . $playerOne . " ";
        }


        display_board($board);
    } else {
        echo $playerTwo . ", choose your location (row, column)" . PHP_EOL;
        $z = readline('enter row ') . PHP_EOL;
        $y = readline('enter column ') . PHP_EOL;
        if ($board[(int)$z][(int)$y] ==  " " . $playerOne . " " || $board[(int)$z][(int)$y] == " " . $playerTwo . " ")
        {
            echo "Already full space" . PHP_EOL;
            $i--;
        } else
        {
            $board[(int)$z][(int)$y] = " " . $playerTwo . " ";
        }

        display_board($board);

    }
}

echo "It`s a draw!!!" . PHP_EOL;

