<?php

use Tmdb\Laravel\Facades\Tmdb;

return Tmdb::getMoviesApi()->getSimilar($id);