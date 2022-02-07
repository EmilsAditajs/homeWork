<?php
/**
 * Created by PhpStorm.
 * User: 37129
 * Date: 07/02/2022
 * Time: 12:42
 */

Class Account
{
    private string $name;
    private float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit(float $input)
    {
        $this->balance += $input;
    }

    public  function withdraw (float $input)
    {
        $this->balance -= $input;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance (): float
    {
        return $this->balance;
    }

    public function transfer (Account $account, float $howMuch)
    {
        $this->balance -= $howMuch;
        $account->balance += $howMuch;
    }
}

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state".PHP_EOL;
echo $bartos_account->getName().PHP_EOL;
echo $bartos_swiss_account->getBalance().PHP_EOL;

$bartos_account->withdraw(20);
echo "Barto's account balance is now: " . $bartos_account->getBalance().PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->getBalance().PHP_EOL;

echo "Final state".PHP_EOL;
echo $bartos_account->getBalance().PHP_EOL;
echo $bartos_swiss_account->getBalance().PHP_EOL.PHP_EOL;


$matt = new Account('Matt`s account', 1000);
$me = new Account('My account', 0);
$matt->withdraw(100);
$me->deposit(100);

echo $me->getName().", ".$me->getBalance().PHP_EOL;
echo $matt->getName().", ".$matt->getBalance().PHP_EOL.PHP_EOL;


$A = new Account('A', 100);
$B = new Account('B', 0);
$C = new Account('C', 0);
$A->transfer($B, 50);
$A->transfer($C, 50);

echo $A->getName().", ".$A->getBalance().PHP_EOL;
echo $B->getName().", ".$B->getBalance().PHP_EOL;
echo $C->getName().", ".$C->getBalance().PHP_EOL;