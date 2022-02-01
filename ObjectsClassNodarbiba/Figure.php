<?php
Class Figures
{
    protected string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function area():float
    {
        return 0;
    }
}

Class Circle extends Figures
{
    protected int $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function area(): float
    {
        return pow($this->radius, 2)*pi();
    }
}
Class Triangle extends Figures
{
    protected int $sideLength;
    protected int $height;

    public function __construct($name, $sideLength, $height)
    {
        parent::__construct($name);
        $this->sideLength = $sideLength;
        $this->height = $height;
    }

    public function area(): float
    {
        return $this->sideLength * $this->height * 0.5;
    }
}
Class Square extends Figures
{
    protected int $side;

    public function __construct($name, $side)
    {
        parent::__construct($name);
        $this->side =$side;
    }

    public function area(): float
    {
        return $this->side * $this->side;
    }
}

$circle = new Circle('Circle', 5);

$triangle = new Triangle('Triangle', 8, 5);

$square = new Square('Square', 7);

Class AreaSum extends Figures
{
    public array $figureSum = [];

    public function addFigure(Figures $figure): void
    {
        $this->figureSum[]=$figure->area();
    }

    public function areaSum()
    {
        $sum = 0;
        foreach($this->figureSum as $figureArea)
        {
            $sum += $figureArea;
        }
        return $sum;
    }
}

$sth = new AreaSum();
$sth->addFigure($circle);
$sth->addFigure($triangle);
$sth->addFigure($square);

echo $sth->areaSum() . PHP_EOL;

