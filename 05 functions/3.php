<?php
$person = new stdClass();
$person -> name = "John";
$person -> surname = "Doe";
$person -> age = 50;
function checkAge(object $person): string
{
    $personAge = $person -> age;
    if ($personAge >= 18) {
        return "Person has reached the age of 18" . "\n";
    } else {
        return "Person has not reached the age of 18" . "\n";
    }
}
echo checkAge($person);