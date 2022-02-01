<?php
class Geometry {
    public static function circleArea ($radius)
    {
        if ($radius > 0)
        {
            return pi() * pow($radius, 2);
        }
        else
        {
            return "error, invalid value";
        }
    }
    public static function triangleArea ($base, $height)
    {
        if ($base >= 0 && $height >= 0)
        {
            return $base * $height * 0.5;
        }
        else
        {
            return "error, invalid value(s)";
        }
    }
    public static function rectangleArea ($length, $width)
    {
        if ($length >= 0 && $width >= 0)
        {
            return $length * $width;
        }
        else
        {
            return "error, invalid value";
        }
    }
}

echo "Geometry calculator:

Calculate the Area of a Circle
Calculate the Area of a Rectangle
Calculate the Area of a Triangle
Quit
Enter your choice (1-4):";

$choice = readline ("> ");

if ($choice == 1)
{
    echo "Enter the radius:";
    $radius = readline("> ");
    echo "Area of the circle is: " . Geometry::circleArea($radius) . PHP_EOL;
}
elseif ($choice == 2)
{
    echo "Enter the length:";
    $length = readline("> ");
    echo "Enter the width:";
    $width = readline ("> ");
    echo "Area of the rectangle is: " . Geometry::rectangleArea($length, $width) . PHP_EOL;
}
elseif ($choice == 3)
{
    echo "Enter the base:";
    $base = readline ("> ");
    echo "Enter the height:";
    $height = readline ("> ");
    echo "Area of the triangle is: " . Geometry::triangleArea($base, $height) . PHP_EOL;
}
elseif ($choice == 4)
{
    echo "You have quit.";
}
else
{
    echo "error, invalid choice";
}