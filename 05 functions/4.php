<?php
class Person
{
    public $name;
    public $lastName;
    public $age;
}

$person1 = new Person ();
$person1 -> name = "Janis";
$person1 -> lastName = "Peteris";
$person1 -> age = 12;

$person2 = new Person ();
$person2 -> name = "Anna";
$person2 -> lastName = "Kanna";
$person2 -> age = "69";

$people = [$person1, $person2];

function checkAge(object $person): string {
    $personAge = $person -> age;
    if ($personAge >= 18) {
        return "Person has reached the age of 18" . "\n";
    } else {
        return "Person has not reached the age of 18" . "\n";
    }
}
foreach ($people as $person) {
    echo checkAge($person);
}