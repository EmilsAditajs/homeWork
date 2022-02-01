<?php
Class Product
{
    public string $name;
    public float $startPrice;
    public int $amount;

    public function __construct($name, $startPrice, $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct():string
    {
        return $this->name . ", price " . $this->startPrice . ", amount " . $this->amount . PHP_EOL;
    }

    public function setAmount($input)
    {
        $this->amount = $input;
    }

    public function setPrice($input)
    {
        $this->startPrice = $input;
    }
}

$logitechMouse = new Product ('Logitech mouse', 70.00, 14);
$iPhone = new Product ('iPhone 5s', 999.99, 3);
$epson = new Product ('Epson EB-U05', 440.46, 1);

echo $logitechMouse->printProduct();
echo $iPhone->printProduct();
echo $epson->printProduct();

$logitechMouse->setAmount(5);

$logitechMouse->setPrice(60.00);

var_dump($logitechMouse);