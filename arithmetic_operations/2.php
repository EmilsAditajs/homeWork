<?php
$number = 3;
function CheckOddEven(int $number) {
    if($number % 2 == 0) {
    echo "Even Number" . "\n";
} else {
    echo "Odd Number" . "\n";
}
echo "bye!" . "\n";
};
echo CheckOddEven($number);