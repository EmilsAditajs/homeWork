<?php
class Employees
{
   public $basePay;
   public $hours;
}

$employee1 = new Employees ();
$employee1 -> basePay = 7.50;
$employee1 -> hours = 35;

$employee2 = new Employees ();
$employee2 -> basePay = 8.20;
$employee2 -> hours = 47;

$employee3 = new Employees ();
$employee3 -> basePay = 10.00;
$employee3 -> hours = 73;

$workers = [$employee1, $employee2, $employee3];


foreach ($workers as $worker)
{
    if ($worker -> basePay >= 8.00 && $worker -> hours < 40)
    {
        echo $worker -> hours * $worker -> basePay . PHP_EOL;
    }
    elseif ($worker -> basePay >= 8.00 && $worker -> hours <= 60)
    {
        $overtime = $worker -> hours - 40;
        $salary = ($worker -> basePay * 40) + ($overtime * $worker -> basePay * 1.5);
        echo $salary . PHP_EOL;
    } else {
        echo "error" . PHP_EOL;
    }
}