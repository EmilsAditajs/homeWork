<?php
Class Point
{
    public int $x;
    public int $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints (object $point)
    {
        $xTemporary = $this->x;
        $yTemporary = $this->y;

        $this->x = $point->x;
        $this->y = $point->y;

        $point->x = $xTemporary;
        $point->y = $yTemporary;
    }
}

$p1 = new Point (5, 2);
$p2 = new Point (-3, 6);

$p1->swapPoints($p2);

var_dump($p1);
var_dump($p2);