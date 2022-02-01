<?php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($array as $nr) {
    if ($nr%3 == 0) {
        echo $nr . "\n";
    }
}