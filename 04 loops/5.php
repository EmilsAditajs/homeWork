<?php
class Person
{
public $name;
public $lastName;
public $age;
public $birthday;
}
$person1 = new Person ();
$person1 -> name = "Janis";
$person1 -> lastName = "Peteris";
$person1 -> age = 100;
$person1 -> birthday = "01.01.2001";

$person2 = new Person ();
$person2 -> name = "Anna";
$person2 -> lastName = "Kanna";
$person2 -> age = "69";
$person2 -> birthday = "02.02.2002";

$people = [$person1, $person2];
foreach ($people as $person) {
    echo $person -> name . "\n" . $person -> lastName . "\n" . $person -> age . "\n" . $person -> birthday . "\n" . "\n";
}