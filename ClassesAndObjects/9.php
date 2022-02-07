<?php
/**
 * Created by PhpStorm.
 * User: 37129
 * Date: 05/02/2022
 * Time: 15:17
 */

Class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    function showUserNameAndBalance():string
    {
        if($this->balance < 0) {
            return $this->name.', -$'.abs(number_format($this->balance, 2)).PHP_EOL;
        }
        return $this->name.', $'.number_format($this->balance, 2).PHP_EOL;
    }
}

$ben = new BankAccount('Benson', -17.25);
echo $ben->showUserNameAndBalance();