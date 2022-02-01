<?php
$frstArray = [];

for ($i = 0; $i < 10; $i++)
{
    $frstArray[] = rand (1, 100);
}

$scndArray = $frstArray;

array_pop($frstArray);
array_push($frstArray, -7);

echo "Array 1: ";
foreach ($frstArray as $frst)
{
    echo $frst . " ";
}
echo PHP_EOL;

echo "Array 2: ";
foreach ($scndArray as $scnd)
{
    echo $scnd . " ";
}
echo PHP_EOL;