<?php

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

Class Survey
{
    private int $surveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrusDrinks;

    public function __construct($surveyed, $purchasedEnergyDrinks, $preferCitrusDrinks)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }

    function calculate_energy_drinkers()
    {
        // throw new LogicException(";(");
        return floor($this->surveyed * $this->purchasedEnergyDrinks);
    }

    function calculate_prefer_citrus()
    {
        // throw new LogicException(";(");
        return floor($this->calculate_energy_drinkers() * $this->preferCitrusDrinks);
    }
}

$newSurvey = new Survey(12467, 0.14, 0.64);





/*
fixme
echo "Total number of people surveyed " . $surveyed;
echo "Approximately " . ? . " bought at least one energy drink";
echo ? . " of those " . "prefer citrus flavored energy drinks.";
*/