<?php

echo "Your weight(lbs):" . PHP_EOL;
$weight = readline("> ");
echo "Your height(in):" . PHP_EOL;
$height = readline ("> ");

$bmi = $weight * 703 / pow($height, 2);

if ($bmi > 18.5)
{
    echo "You are underweight" . PHP_EOL;
}
elseif ($bmi > 25)
{
    echo "You are overweight" . PHP_EOL;
}
else
{
    echo "Your weight is optimal" . PHP_EOL;
}