<?php
Class Movie
{
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }
}

Class Library
{
    public array $movie = [];

    public function addMovie(Movie $movie)
    {
        $this->movie[] = $movie;
    }

    public function getPG(string $input):array
    {
        $result = [];
        foreach ($this->movie as $film)
        {
            if($film->rating == $input)
            {
                $result[] = $film;
            }
        }
        return $result;
    }
}


$moviePack = new Library();

$casino = new Movie('Casino Royale', 'Eon productions', 'PG13');
$moviePack->addMovie($casino);
$glass = new Movie('Glass', 'Buena Vista International', 'PG13');
$moviePack->addMovie($glass);
$spider = new Movie('Spider-Verse', 'Columbia pictures', 'PG');
$moviePack->addMovie($spider);

$input = readline('Search by rating : ');
foreach($moviePack->getPG($input) as $result) {
    echo $result->title . ' ' . $result->studio . ' ' . $result->rating . PHP_EOL;
}

