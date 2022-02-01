<?php
echo "I'm thinking of a number between 1-100.  Try to guess it." . "\n";

$nr = rand (1, 100);
$guess = readline ("> ");
if ($guess > $nr) {
    echo "Sorry, you are too high.  I was thinking of " . $nr . "\n";
} elseif ($guess == $nr) {
    echo "You guessed it!  What are the odds?!?" . "\n";
} else {
    echo "Sorry, you are too low.  I was thinking of " . $nr . "\n";
}