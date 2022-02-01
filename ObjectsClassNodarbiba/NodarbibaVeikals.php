<?php

class Product
{
    public string $name;
    public int $price;
    public int $quantity;

    public function __construct(string $name, int $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

$meat = new Product('meat', 5, 150);
$sock = new Product('sock', 2, 50);
$milk = new Product('milk', 1, 100);

class Store
{
    public array $inventory = [];

    public function addProduct(Product $product): void
    {
        $this->inventory[] = $product;
    }

    public function getStuff(): string
    {
        $stuff = '';
        foreach ($this->inventory as $product) {
            $stuff .= $product->name . " " . $product->price . " $" . $product->quantity . PHP_EOL;
        }
        return $stuff;
    }

    public function totalSum(): int
    {
        $sum = 0;
        foreach ($this->inventory as $product) {
            $sum += $product->price * $product->quantity;
        }
        return $sum;
    }
}

$shelf = new Store();
$shelf->addProduct($meat);
$shelf->addProduct($sock);
$shelf->addProduct($milk);

echo $shelf->getStuff();
echo "----------------" . PHP_EOL;
echo "Total : " . $shelf->totalSum() . "$" . PHP_EOL;

