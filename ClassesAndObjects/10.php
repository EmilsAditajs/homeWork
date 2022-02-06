<?php
/**
 * Created by PhpStorm.
 * User: 37129
 * Date: 05/02/2022
 * Time: 15:17
 */


class Application
{
    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies()
    {
        //todo
    }

    private function rent_video()
    {
        //todo
    }

    private function return_video()
    {
        //todo
    }

    private function list_inventory()
    {
        //todo
    }
}

class VideoStore
{
    public array $videos = [];

    public function addVideo (Video $video)
    {
        $this->videos[] = $video;
    }

    public function checkOutVideo (Video $video)
    {
        $video->setAvailability();
    }

    public function returnVideo (Video $video)
    {
        $video->setAvailability();
    }

    public function addRating (int $input, Video $video)
    {
        $v = array_search($video, $this->videos);
        $this->videos[$v]->rating[] = $input;
    }

    public function list(): string
    {
        $text = '';
        foreach ($this->videos as $movie) {
            $text .= $movie->getTitle()." Rating: ". $movie->getRating()." ".$this->checkAvailability($movie).PHP_EOL;
        }
        return $text;
    }

    public function checkAvailability (Video $video): string
    {
        if ($video->getAvailability()) {
            return "AVAILABLE";
        } else {
            return "NOT AVAILABLE";
        }
    }
}

class Video extends Videostore
{
    public string $title;
    public bool $availability = true;
    public array $rating = [];

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAvailability (): bool
    {
        return $this->availability;
    }

    public function getRating():float
    {
        if(count($this->rating) == 0) {
            return 0;
        }
        return array_sum($this->rating) / count($this->rating);
    }

    public function setAvailability (): void
    {
        $this->availability = !$this->availability;
    }
}



$app = new Application();
//$app->run();