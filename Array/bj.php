<?php

Class Deck
{
    public array $deck = [];

    public function addCard(object $card)
    {
        $this->deck[] = $card;
    }
}

Class Card
{
    public string $name;
    public int $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}

$deck = new Deck;

$deck->addCard(new Card('2 of spades', 2));
$deck->addCard(new Card('3 of spades', 3));
$deck->addCard(new Card('4 of spades', 4));
$deck->addCard(new Card('5 of spades', 5));
$deck->addCard(new Card('6 of spades', 6));
$deck->addCard(new Card('7 of spades', 7));
$deck->addCard(new Card('8 of spades', 8));
$deck->addCard(new Card('9 of spades', 9));
$deck->addCard(new Card('10 of spades', 10));
$deck->addCard(new Card('Jack of spades', 10));
$deck->addCard(new Card('Queen of spades', 10));
$deck->addCard(new Card('King of spades', 10));
$deck->addCard(new Card('Ace of spades', 11));
$deck->addCard(new Card('2 of clubs', 2));
$deck->addCard(new Card('3 of clubs', 3));
$deck->addCard(new Card('4 of clubs', 4));
$deck->addCard(new Card('5 of clubs', 5));
$deck->addCard(new Card('6 of clubs', 6));
$deck->addCard(new Card('7 of clubs', 7));
$deck->addCard(new Card('8 of clubs', 8));
$deck->addCard(new Card('9 of clubs', 9));
$deck->addCard(new Card('10 of clubs', 10));
$deck->addCard(new Card('Jack of clubs', 10));
$deck->addCard(new Card('Queen of clubs', 10));
$deck->addCard(new Card('King of clubs', 10));
$deck->addCard(new Card('Ace of clubs', 11));
$deck->addCard(new Card('2 of hearts', 2));
$deck->addCard(new Card('3 of hearts', 3));
$deck->addCard(new Card('4 of hearts', 4));
$deck->addCard(new Card('5 of hearts', 5));
$deck->addCard(new Card('6 of hearts', 6));
$deck->addCard(new Card('7 of hearts', 7));
$deck->addCard(new Card('8 of hearts', 8));
$deck->addCard(new Card('9 of hearts', 9));
$deck->addCard(new Card('10 of hearts', 10));
$deck->addCard(new Card('Jack of hearts', 10));
$deck->addCard(new Card('Queen of hearts', 10));
$deck->addCard(new Card('King of hearts', 10));
$deck->addCard(new Card('Ace of hearts', 11));
$deck->addCard(new Card('2 of diamonds', 2));
$deck->addCard(new Card('3 of diamonds', 3));
$deck->addCard(new Card('4 of diamonds', 4));
$deck->addCard(new Card('5 of diamonds', 5));
$deck->addCard(new Card('6 of diamonds', 6));
$deck->addCard(new Card('7 of diamonds', 7));
$deck->addCard(new Card('8 of diamonds', 8));
$deck->addCard(new Card('9 of diamonds', 9));
$deck->addCard(new Card('10 of diamonds', 10));
$deck->addCard(new Card('Jack of diamonds', 10));
$deck->addCard(new Card('Queen of diamonds', 10));
$deck->addCard(new Card('King of diamonds', 10));
$deck->addCard(new Card('Ace of diamonds', 11));


function sumValue(array $hand):int
{
    $sum = 0;
    foreach($hand as $card) {
        $sum += $card->value;
    }
    return $sum;
}

$playerHand = [];
$dealerHand = [];


echo 'Start the game?(y/n)' . PHP_EOL;
$menu = readline('>>> ');
echo PHP_EOL;
if($menu !== 'y') {
    exit;
}
for ($x = 0; $x < 2; $x++) {
    $playerHand[] = $deck->deck[rand(0, count($deck->deck) - 1)];
    $dealerHand[] = $deck->deck[rand(0, count($deck->deck) - 1)];
}

foreach($playerHand as $card) {
    echo $card->name . PHP_EOL;
}
echo sumValue($playerHand) . PHP_EOL;


while (true) {
    echo PHP_EOL . '[0] Take card' . PHP_EOL;
    echo "[Any] Hold" . PHP_EOL;
    $gameMenu =(int) readline('>> ');
    if($gameMenu !== 0) {
        break;
    }
    $playerHand[] = $deck->deck[rand(0, count($deck->deck) - 1)];
    echo PHP_EOL;
    foreach($playerHand as $hand) {
        echo $hand->name . PHP_EOL;
    }
    echo sumValue($playerHand, $deck) . PHP_EOL;
    echo PHP_EOL;
    if(sumValue($playerHand, $deck) > 21) {
        echo 'You lose!!!' . PHP_EOL;
        exit;
    }
}



while (true) {
    echo PHP_EOL;
    foreach($dealerHand as $card) {
        echo $card->name . PHP_EOL;
        sleep(1);
    }
    echo sumValue($dealerHand) . PHP_EOL . PHP_EOL;
    sleep(1);
    if(sumValue($dealerHand) < 17) {


        echo sumValue($dealerHand) . PHP_EOL;
        sleep(1);
    }
    if(sumValue($dealerHand) == sumValue($playerHand)) {
        echo 'Its a draw!!!' . PHP_EOL;
        exit;
    }
    if(sumValue($dealerHand) > 21) {
        echo 'Player Wins!!!' . PHP_EOL;
        exit;
    }
    if(sumValue($dealerHand) > sumValue($playerHand)) {
        echo 'Dealer wins!!!' . PHP_EOL;
        exit;
    }
    if(sumValue($dealerHand) < sumValue($playerHand)) {
        echo 'Player wins!!!' . PHP_EOL;
        exit;
    }
}
