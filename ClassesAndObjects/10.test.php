<?php
/**
 * Created by PhpStorm.
 * User: 37129
 * Date: 05/02/2022
 * Time: 18:04
 */

require_once '10.php';

Class VideoStoreTest
{
    public function checkIfMoviesAdded (VideoStore $store): bool
    {
        $matrix = new Video('The Matrix');
        $store->addVideo($matrix);
        $godfather = new Video('Godfather II');
        $store->addVideo($godfather);
        $starWars = new Video('Star Wars Episode IV: A New Hope');
        $store->addVideo($starWars);

        return count($store->videos) === 3;
    }

    public function checkIfRatingsAddUp (VideoStore $store): bool
    {
        foreach($store->videos as $movie) {
            $store->addRating(9, $movie);
            $store->addRating(8, $movie);
        }

        foreach($store->videos as $movie) {
            if($movie->getRating() !== 8.5) {
                return false;
            }
        }
        return true;
    }

    public function checkIfNotAvailableAfterCheckOut (VideoStore $store):bool
    {
        foreach($store->videos as $video) {
            $store->checkOutVideo($video);
        }

        foreach($store->videos as $video) {
            if($store->checkAvailability($video)) {
                return true;
            }
        }
        return false;
    }

    public function checkIfAvailableAfterReturn (VideoStore $store):bool
    {
        foreach($store->videos as $video) {
            $store->returnVideo($video);
        }

        foreach($store->videos as $video) {
            if($store->checkAvailability($video)) {
                return true;
            }
        }
        return false;
    }
}

$vStore = new VideoStore();
$test = new VideoStoreTest();

if($test->checkIfMoviesAdded($vStore)) {
    echo 'Test 1 (checkIfMoviesAdded) good'.PHP_EOL;
} else {
    echo 'Test 1 (checkIfMoviesAdded) bad'.PHP_EOL;
}

if($test->checkIfRatingsAddUp($vStore)) {
    echo 'Test 2 (checkIfRatingsAddUp) good'.PHP_EOL;
} else {
    echo 'Test 2 (checkIfRatingsAddUp) bad'.PHP_EOL;
}

if($test->checkIfNotAvailableAfterCheckOut($vStore)) {
    echo 'Test 3 (checkIfNotAvailableAfterCheckOut) good'.PHP_EOL;
} else {
    echo 'Test 3 (checkIfNotAvailableAfterCheckOut) bad'.PHP_EOL;
}

if($test->checkIfAvailableAfterReturn($vStore)) {
    echo 'Test 4 (checkIfAvailableAfterReturn) good'.PHP_EOL;
} else {
    echo 'Test 4 (checkIfAvailableAfterReturn) bad'.PHP_EOL;
}
