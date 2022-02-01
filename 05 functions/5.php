<?php

$fruits = [
    [
        "type" => "apple",
        "weight" => 9
    ],
    [
        "type" => "banana",
        "weight" => 19
    ]
];
$shippingCost = [
    "over10" => 2,
    "under10" => 1
];

function checkWeight(array $fruits)
{
    foreach ($fruits as $fruit)
    {
        if ($fruit["weight"] > 10)
        {
            print "The weight of " . $fruit['type'] . "s is " . $fruit['weight'] . "kg , and the cost of shipping is EUR " . $fruit['weight'] * 2 . ".00." . PHP_EOL;
        }
        else
        {
            print "The weight of " . $fruit['type'] . "s is " . $fruit['weight'] . "kg , and the cost of shipping is EUR " . $fruit['weight'] * 1 . ".00." . PHP_EOL;
        }
    }
}

echo checkWeight($fruits);




