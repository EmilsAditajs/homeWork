<?php
$string = "emils";
function addCodelex(string $string): string
{
    return $string . "codelex" . "\n";
};
echo addCodelex($string);