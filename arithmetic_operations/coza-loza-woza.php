<?php

$startNr = 1;
$endNr = 110;

function cozaLozaWoza($startNr, $endNr)
{
    $i = $startNr;
    while ($i < ($endNr + 1)) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            print "CozaLoza" . " ";
        } elseif ($i % 3 == 0 && $i % 7 == 0) {
            print "CozaWoza" . " ";
        } elseif ($i % 5 == 0 && $i % 7 == 0) {
            print "WozaLoza" . " ";
        } elseif ($i % 3 == 0) {
            print "Coza" . " ";
        } elseif ($i % 5 == 0) {
            print "Loza" . " ";
        } elseif ($i % 7 == 0) {
            print "Woza" . " ";
        } else {
            print $i . " ";
        }
        $i++;
        if ($i == 12 || $i == 23 || $i == 34 || $i == 45 || $i == 56 || $i == 67 || $i == 78 || $i == 89 || $i == 100) {
            print PHP_EOL;
        };
    }
}

echo cozaLozaWoza($startNr, $endNr);