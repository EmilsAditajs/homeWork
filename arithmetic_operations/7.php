<?php
$a = -9.81;
$t = 10;
$Vi = 0;
$Xi = 0;
function x($t, $a, $Vi, $Xi) {
    return 0.5 * $a * pow($t, 2) + $Vi * $t + $Xi . PHP_EOL;
}
echo x($t, $a, $Vi, $Xi);
