<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo

echo "Original numeric array: ";
foreach ($numbers as $number)
{
    echo $number . " ";
}
echo PHP_EOL;

//todo

echo "Sorted numeric array: ";

sort($numbers);

$nrLength = count($numbers);

for ($i = 0; $i < $nrLength; $i++)
{
    echo $numbers[$i] . " ";
}

echo PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: ";

foreach ($words as $word)
{
    echo $word . " ";
}

echo PHP_EOL;

//todo
echo "Sorted string array: ";
sort($words);
$wrdLength = count($words);
for ($j = 0; $j < $wrdLength; $j++)
{
    echo $words[$j] . " ";
}
echo PHP_EOL;
