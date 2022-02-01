<?php
$startNr = 1;
$endNr = 100;
$sum = 0;
for ($i = $startNr; $i <= $endNr; $i++) {
    $sum += $i;
};
$average = array_sum(range($startNr, $endNr))/count(range($startNr, $endNr));
echo "the sum of $startNr to $endNr is $sum" . "\n";
echo "the average is $average" . "\n";