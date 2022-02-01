<?php

[$name, $cash] = explode(',', file_get_contents('buyer.txt'));

$person = new stdClass();
$person -> name = $name;
$person -> cash = (int) $cash;

function createProduct( $id, $prName, $price, $category, $description, $expiryDate, $amount): stdClass
{
    $product = new stdClass();
    $product -> id = $id;
    $product -> name = $prName;
    $product -> price = $price;
    $product -> category = $category;
    $product -> description = $description;
    $product -> expiryDate = $expiryDate;
    $product -> amount = $amount;
    return $product;
}

$products = [];

$row = 1;
if(($handle = fopen('products.csv', 'r')) !== false)
{
    while (($data = fgetcsv($handle, 1000, ",")) !== false)
    {
        [$id, $prName, $price, $category, $description, $expiryDate, $amount] = $data;
        $products[] = createProduct( $id,  $prName,  $price,  $category,  $description,  $expiryDate,  $amount);
    }
    fclose($handle);
}


echo "{$person->name} has {$person -> cash}$" . PHP_EOL . PHP_EOL;

$basket = [];

foreach ($products as $product)
{
    echo "{$product -> id} {$product -> name} {$product -> price} {$product -> category} {$product -> description} {$product -> expiryDate} {$product -> amount}" . PHP_EOL;
}

$selectedProductIndex = (int) readline("Select product:");

$product = $products[$selectedProductIndex] ?? null;

if ($product === null)
{
    echo "Product not found." . PHP_EOL;
    exit;
}

if ($person -> cash < $product -> price)
{
    echo "Insufficient funds" . PHP_EOL;
    exit;
}

$basket = explode (',', file_get_contents('basket.txt'));

while (true)
{
    echo "[1] Purchase some more products" . PHP_EOL . "[2] Checkout." . PHP_EOL . "[any] Exit" . PHP_EOL;
    $option = (int) readline ("Select an option:");

    switch ($option)
    {
        case 1:
            foreach ($products as $index => $product)
            {
                echo "[{$index}] {$product -> name} {$product -> price}" . PHP_EOL;
            }

            $selectedProductIndex = (int) readline("Select product:");

            $product = $products[$selectedProductIndex] ?? null;

            if ($product === null)
            {
                echo "Product not found." . PHP_EOL;
                exit;
            }

            $basket [] = $selectedProductIndex;

            echo "Added " . $product -> name . " to the basket" . PHP_EOL;

            break;
        case 2:
            $totalSum = 0;
            foreach ($basket as $selectedProductIndex)
            {
                $product = $products[$selectedProductIndex];
                $totalSum += $product -> price;
                echo $product->name . PHP_EOL;
            }
            echo "________________" . PHP_EOL;
            echo "Total: " .  $totalSum . PHP_EOL;
            if ($totalSum <= $person -> cash)
            {
                echo "Successful payment" . PHP_EOL;
            }
            else
            {
                echo "Insufficient funds." . PHP_EOL;
            }
            exit;
        default:
            $productIndexes = implode(',', $basket);
            file_put_contents('basket.txt', $productIndexes);
            echo "Basket saved.";
            exit;

    }
}