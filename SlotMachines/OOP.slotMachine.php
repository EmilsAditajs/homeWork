<?php

class Person
{
    public string $name;
    public int $credit;
    public int $bet;

    public function __construct($name, $credit, $bet)
    {
        $this->name = $name;
        $this->credit = $credit;
        $this->bet = $bet;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCredit(): int
    {
        return $this->credit;
    }

    public function setCredit(object $game)
    {
        $this->credit -= $this->bet;

        foreach ($game->winningSymbols as $letter) {
            $this->credit += $this->bet * $game->symbols[$letter];
        }
    }

    public function setBet(int $input)
    {
        $this->bet = $input;
    }
}

class GameStuff
{
    public array $symbols = [];
    public array $combos3x3 = [];
    public array $combos3x4 = [];
    public array $combos = [];
    public array $screen = [];
    public array $winningSymbols = [];

    public function addCombo3x3(object $combination)
    {
        $this->combos3x3[] = $combination->comboCoordinates;
    }

    public function addCombo3x4(object $combination)
    {
        $this->combos3x4[] = $combination->comboCoordinates;
    }

    public function switchCombos($boardMode)
    {
        if($boardMode == 0) {
            $this->combos = $this->combos3x3;
        } else {
            $this->combos = $this->combos3x4;
        }
    }

    public function addSymbol(object $symbol)
    {
        $this->symbols[$symbol->char] = $symbol->value;
    }

    public function createScreen(object $board)
    {
        for ($x = 0; $x < $board->rows; $x++) {
            for ($y = 0; $y < $board->columns; $y++) {
                {
                    $randomSymbol = $this->symbols[array_rand($this->symbols)];
                    $this->screen[$x][$y] = array_search($randomSymbol, $this->symbols);
                }
            }
        }
    }


    public function getWinningSymbols():bool
    {
        for ($a = 0; $a < count($this->combos); $a++) {
            $newArray = [];

            for ($b = 0; $b < count($this->combos[$a]); $b++) {
                [$c, $d] = $this->combos[$a][$b];
                $newArray[] = $this->screen[$c][$d];
            }

            if (count(array_unique($newArray)) === 1) {
                $this->winningSymbols[] = $this->screen[$c][$d];
                return true;
            }
        }
        return false;
    }

    public function deleteLuckySymbols()
    {
        unset($this->winningSymbols);
        $this->winningSymbols = [];
    }
}

class Symbol
{
    public string $char;
    public int $value;

    public function __construct($char, $value)
    {
        $this->char = $char;
        $this->value = $value;
    }
}

class Combination
{
    public string $combo;
    public array $comboCoordinates = [];

    public function __construct($combo)
    {
        $this->combo = $combo;
        $temporaryCombo = str_split($this->combo, 1);
        for ($x = 0; $x < count($temporaryCombo); $x++) {
            if ($x % 2 == 0) {
                $this->comboCoordinates[floor($x / 2)][$x % 2] = $temporaryCombo[$x];
            }
            $this->comboCoordinates[floor($x / 2)][$x % 2] = $temporaryCombo[$x];
        }
    }
}

class Board
{
    public int $rows;
    public int $columns;

    public function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }
}


$game = new GameStuff();

$a = new Symbol('A', 1);
$game->addSymbol($a);
$b = new Symbol('B', 2);
$game->addSymbol($b);
$c = new Symbol('C', 3);
$game->addSymbol($c);

$firstLine3x3 = new Combination('000102');
$game->addCombo3x3($firstLine3x3);
$secondLine3x3 = new Combination('101112');
$game->addCombo3x3($secondLine3x3);
$thirdLine3x3 = new Combination('202122');
$game->addCombo3x3($thirdLine3x3);

$firstLine3x4 = new Combination('00010203');
$game->addCombo3x4($firstLine3x4);
$secondLine3x4 = new Combination('10111213');
$game->addCombo3x4($secondLine3x4);
$thirdLine3x4 = new Combination('20212223');
$game->addCombo3x4($thirdLine3x4);

echo "[0] 3x3 mode" . PHP_EOL;
echo "[1] 3x4 mode" . PHP_EOL;
$screenMode =(int) readline('>> ');
$game->switchCombos($screenMode);
if($screenMode == 0) {
    $newBoard = new Board(3,3);
} else {
    $newBoard = new Board(3,4);
}

$name = (string)readline('Enter player name: ');
$credits = (int)readline('Enter credits: ');
$bet = (int)readline('Enter bet: ');
$playerOne = new Person($name, $credits, $bet);

echo PHP_EOL . "[0] Start the game" . PHP_EOL;
echo "[any] EXIT" . PHP_EOL;

$option = (int)readline('>> ');
echo PHP_EOL;
if ($option !== 0) {
    exit;
}

$game->createScreen($newBoard);
foreach ($game->screen as $row) {
    foreach ($row as $column) {
        echo " {$column} ";
    }
    echo PHP_EOL;
}

$game->getWinningSymbols();
if($game->getWinningSymbols())
{
    echo "You win!!!" . PHP_EOL;
}
$playerOne->setCredit($game);
if($playerOne->credit == 0) {
    echo "Game over!!!" . PHP_EOL;
    exit;
}
$game->deleteLuckySymbols();
echo "Credits left: " . $playerOne->getCredit() . PHP_EOL;

while (true) {
    if($playerOne->credit < $playerOne->bet) {
        $playerOne->setBet($playerOne->credit);
    } elseif ($playerOne->credit == 0) {
        echo "Game over!!!" . PHP_EOL;
        exit;
    }

    echo PHP_EOL . "[0] Play again" . PHP_EOL;
    echo "[1] Change bet" . PHP_EOL;
    echo "[any] EXIT" . PHP_EOL;

    $secondOption = (int)readline('>> ');

    switch ($secondOption) {
        case 0:
            $game->createScreen($newBoard);
            foreach ($game->screen as $row) {
                foreach ($row as $column) {
                    echo " {$column} ";
                }
                echo PHP_EOL;
            }

            $game->getWinningSymbols();
            if($game->getWinningSymbols())
            {
                echo "You win!!!" . PHP_EOL;
            }
            $playerOne->setCredit($game);
            if($playerOne->credit == 0) {
                echo "Game over!!!" . PHP_EOL;
                exit;
            }
            $game->deleteLuckySymbols();
            echo 'Credits left: ' . $playerOne->getCredit() . PHP_EOL;

            break;

        case 1:
            $newBet = readline('Enter bet: ');
            $playerOne->setBet($newBet);

            echo PHP_EOL . "[0] Start the game" . PHP_EOL;
            echo "[any] EXIT" . PHP_EOL;

            $option = (int)readline('>> ');
            echo PHP_EOL;
            if ($option !== 0) {
                exit;
            }

            $game->createScreen($newBoard);
            foreach ($game->screen as $row) {
                foreach ($row as $column) {
                    echo " {$column} ";
                }
                echo PHP_EOL;
            }

            $game->getWinningSymbols();
            if($game->getWinningSymbols())
            {
                echo "You win!!!" . PHP_EOL;
            }
            $playerOne->setCredit($game);
            if($playerOne->credit == 0) {
                echo "Game over!!!" . PHP_EOL;
                exit;
            }
            $game->deleteLuckySymbols();
            echo 'Credits left:' . $playerOne->getCredit() . PHP_EOL;

            break;

        default:
            echo $playerOne->getName() . " has left the game with " . $playerOne->getCredit() . " credits." . PHP_EOL;

            exit;
    }
}
