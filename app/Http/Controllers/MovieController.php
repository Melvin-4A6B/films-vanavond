<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($movie) {
        return view("movie.show", [
            "movie" => $movie
        ]);
    }
}
