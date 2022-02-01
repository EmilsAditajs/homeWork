<?php
$requester = new stdClass();
$requester -> name = "John";
$requester -> validLicenses = ["A", "B"];
$requester -> cash = 1000001;

class Guns
{
    public $type;
    public $price;
    public $name;
}

$gun1 = new Guns ();
$gun1 -> name = "shooter";
$gun1 -> type = "A";
$gun1 -> price = 5000;

$gun2 = new Guns ();
$gun2 -> name = "banger";
$gun2 -> type = "C";
$gun2 -> price = 1000000;

$gun3 = new Guns ();
$gun3 -> name = "janis";
$gun3 -> type = "B";
$gun3 -> price = 100000;

$weapons = [$gun1, $gun2, $gun3];


foreach ($weapons as $guns)
{
   if (in_array($guns -> type, $requester -> validLicenses) && ($requester -> cash) > ($guns -> price))
   {
       print $requester -> name . " can buy " . $guns -> name . PHP_EOL;
   }
   else
   {
       print $requester -> name . " can not buy " . $guns -> name . PHP_EOL;
   }
}
