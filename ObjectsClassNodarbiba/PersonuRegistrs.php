<?php
class Person
{
    private string $name;
    private int $lastName;
    private string $personasKods;

    public function __construct(string $name, int $lastName, string $personasKods)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->personasKods = $personasKods;
    }
}

$name = readline("Enter name> ");
$lastName = readline("EnterLastName> ");
$personasKods = readline("Enter personas kods> ");

$newPerson = new Person($name, $lastName, $personasKods);

class Register
{
    private array $register=[];
}

var_dump($newPerson);