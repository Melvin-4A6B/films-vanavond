<?php

use Tmdb\Laravel\Facades\Tmdb;

$stuff = [];

foreach(Tmdb::getGenresApi()->getGenres()["genres"] as $genre) {
    $stuff[$genre["id"]] = $genre["name"];
}

//dd($stuff);

return $stuff;