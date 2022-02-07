<?php

class Card
{
    private string $suit;
    private string $symbol;
    private string $colour;

    public function __construct(string $suit, string $symbol, string $colour)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
        $this->colour = $colour;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function getValue(): int
    {
        if ($this->symbol == "J" || $this->symbol == "Q" || $this->symbol == "K") {
            return 10;
        }
        return (int)$this->symbol;
    }

    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }
}


class Deck
{
    private array $cards = [];
    private array $symbols = [
        '♣', '♦', '♥', '♠'
    ];

    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->shuffle();
    }

    public function draw(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        array_splice($this->cards, $randomCardIndex, 1);
        return $card;
    }

    private function shuffle(): void
    {
        $this->cards = [];
        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                switch ($i) {
                    case 11:

                        break;
                    case 12:
                        if($this->symbols[$j] == '♣' || $this->symbols[$j]  == '♠') {
                            $this->cards[] = new Card($this->symbols[$j], 'Q', 'black');
                        } else {
                            $this->cards[] = new Card($this->symbols[$j], 'Q', 'red');
                        }
                        break;
                    case 13:
                        if($this->symbols[$j]  == '♣' || $this->symbols[$j]  == '♠') {
                            $this->cards[] = new Card($this->symbols[$j], 'K', 'black');
                        } else {
                            $this->cards[] = new Card($this->symbols[$j], 'K', 'red');
                        }
                        break;
                    default:
                        if($this->symbols[$j]  == '♣' || $this->symbols[$j]  == '♠') {
                            $this->cards[] = new Card($this->symbols[$j], $i, 'black');
                        } else {
                            $this->cards[] = new Card($this->symbols[$j], $i, 'red');
                        }
                        break;
                }
            }
        }
        $this->cards[] = new Card('♠', 'J', 'black');
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}

class BlackPeter
{
    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck();
    }

    public function deal()
    {
        return $this->deck->draw();
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public static function equalCard(Card $firstCard, Card $secondCard): bool
    {
        return $firstCard->getSymbol() === $secondCard->getSymbol();
    }
}

class Player
{
    private array $cards = [];

    public function getCards()
    {
        return $this->cards;
    }

    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    public function removePairedCards()
    {
        $filtered = [];
        $n = count($this->cards);
        for ($i = 0; $i < $n; $i++) {
            $ok = true;
            for ($j = 0; $j < $n; $j++) {
                if ($j != $i && $this->cards[$i]->getSymbol() == $this->cards[$j]->getSymbol() && $this->cards[$i]->getColour() == $this->cards[$j]->getColour()) {
                    $ok = false;
                    break;
                }
            }
            if ($ok)
                $filtered[] = $this->cards[$i];
        }
        unset($this->cards);
        $this->cards = $filtered;
    }

    public function pickCard(Player $otherPlayer)
    {
        $randomCardIndex = array_rand($otherPlayer->cards);
        $card = $otherPlayer->cards[$randomCardIndex];
        array_splice($otherPlayer->cards, $randomCardIndex, 1);
        $this->cards[] = $card;
    }
}

$game = new BlackPeter();
$player = new Player();
$npc = new Player();

for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCard($game->deal());
}

foreach ($player->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;

foreach ($npc->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;
echo '============================================================================' . PHP_EOL;

$player->removePairedCards();
$npc->removePairedCards();

foreach ($player->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;

foreach ($npc->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;
echo '============================================================================' . PHP_EOL;

while(count($player->getCards()) > 0 || count($npc->getCards()) > 0)
{
    if(count($player->getCards()) == 0) {
        echo 'Player wins!!!' . PHP_EOL;
        exit;
    } elseif (count($npc->getCards()) == 0) {
        echo 'Computer wins!!!' . PHP_EOL;
        exit;
    }

    $player->pickCard($npc);
    $npc->pickCard($player);
    $player->removePairedCards();
    $npc->removePairedCards();

    foreach ($player->getCards() as $card) {
        echo '| ' . $card->getDisplayValue() . ' |';
    }
    echo PHP_EOL;

    foreach ($npc->getCards() as $card) {
        echo '| ' . $card->getDisplayValue() . ' |';
    }
    echo PHP_EOL;
    echo '============================================================================' . PHP_EOL;
    sleep(1);
}