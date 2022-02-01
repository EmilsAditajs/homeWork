<?php


$words = explode (' ', file_get_contents('6.uzd.txt'));

$rndWordIndex = rand(0, count($words));

$word = $words[$rndWordIndex];

var_dump($word);

$letters = str_split ($word, 1);

$misses = [];

$hits = [];

$line = [];

foreach ($letters as $letter)
{
   $line[] = '-';
}

function gameScreen($misses, $line, $input)
{
    global $misses;
    echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL . PHP_EOL;
    echo 'Word:	';
    foreach ($line as $chr)
    {
        echo $chr;
    }
    echo PHP_EOL . PHP_EOL;
    echo 'Misses: ';
    foreach ($misses as $miss)
    {
        echo $miss . "  ";
    }
    echo PHP_EOL . PHP_EOL;
    echo 'Guess: ' . $input . PHP_EOL . PHP_EOL;
    echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL;
};

echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL . PHP_EOL;
echo 'Word: ';
foreach ($letters as $letter)
{
    echo "-";
}
echo PHP_EOL . PHP_EOL;
echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-';
echo PHP_EOL . PHP_EOL;


for($k = 1; $k <= count($letters); $k++)
{

    echo 'Your guess: ';

    $input = readline(' ');

    if (in_array($input, $hits))
    {
        echo "You already guessed this letter, try again!" . PHP_EOL;
        $k--;
    }
    if (in_array($input, $misses))
    {
        echo "You already guessed this letter, try again!" . PHP_EOL;
        $k--;
    }
    if (in_array($input, $letters) && !in_array($input, $hits))
    {
        $hits[] = $input;
    }
    if (!in_array($input, $letters) && !in_array($input, $misses))
    {
        $misses[] = $input;
    }

    foreach ($letters as $letter)
    {
        foreach (array_keys($letters, $input) as $key)
        {
            if (in_array($input, $letters)) {
                $line[$key] = $input;
            }
            if (!in_array($input, $letters)) {
                $line[$key] = '-';
            }
        }
    }

    if (!in_array('-', $line))
    {
        echo "You guessed '" . $word . "'. You are champion!!!" . PHP_EOL;
        exit;
    }

    echo gameScreen($misses, $line, $input);
}

echo 'You lose ;(((';

