<?php
Class SavingsAccount
{
    public float $startBalance;
    public int $interestRate;

    public function __construct($startBalance, $interestRate)
    {
        $this->startBalance = $startBalance;
        $this->interestRate = $interestRate;
    }

    public function subtract($withdraw)
    {
        $this->startBalance -= $withdraw;
    }

    public function addDeposit($deposit)
    {
        $this->startBalance += $deposit;
    }

    public function addMonthlyInterest($interestRate)
    {
        $this->startBalance += floatval($interestRate / 12) * $this->startBalance;
    }

    public function getBalance()
    {
        return $this->startBalance;
    }
}

$strtBalance = readline('How much money is in the account?: ');
$intrstRate = readline('Enter the annual interest rate: ');
$account = new SavingsAccount($strtBalance, $intrstRate);
$months = readline('Gow long has the account been open?: ');
$x = 1;
$totalDeposited = 0;
$totalWithdrawn = 0;
$balance = $account->getBalance();
while ($x <= $months) {
    echo 'Enter amount deposited for month: ' . $x;
    $deposit = readline(': ');
    $account->addDeposit($deposit);
    $balance  += $deposit;
    $totalDeposited += $deposit;
    echo 'Enter amount withdrawn for month: ' . $x;
    $wthDraw = readline(': ');
    $account->subtract($wthDraw);
    $balance -= $wthDraw;
    $totalWithdrawn += $wthDraw;
    $account->addMonthlyInterest($intrstRate);
    $x++;
}

echo 'Total deposited: $' .  number_format(floatval($totalDeposited), 2) . PHP_EOL;
echo 'Total withdrawn: $' .  number_format(floatval($totalWithdrawn), 2) . PHP_EOL;
echo 'Interest earned: $' . round(floatval($account->getBalance() - $balance), 2) . PHP_EOL;
echo 'Ending balance: $' . round($account->getBalance(), 2) . PHP_EOL;