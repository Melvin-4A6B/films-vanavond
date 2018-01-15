<?php

namespace App\Http\Controllers;

use Tmdb\Laravel\Facades\Tmdb;

class MovieController extends Controller
{
    public function show() {

        $today = date("d-m-Y");
        $data = file_get_contents('http://api.filmtotaal.nl/filmsoptv.xml?apikey='.env("FILMTOTAAL_KEY").'&dag='.$today.'&sorteer=0');
        $data = new \SimpleXMLElement($data);
        $data = response()->json($data);
        return view("movie.show", compact("data"));
    }

    public function info($id) {
        $data = Tmdb::getFindApi()->findBy($id, [
            'external_source' => 'imdb_id'
        ])["movie_results"][0];

        $details = Tmdb::getMoviesApi()->getMovie($data["id"]);

        dd($details);

        $trailers = Tmdb::getMoviesApi()->getTrailers($data["id"]);

        $similar = Tmdb::getMoviesApi()->getSimilar($data["id"])["results"];

        $credits = Tmdb::getMoviesApi()->getCredits($data["id"]);


        try  {

            $kijkwijzerData = file_get_contents("http://api.kijkwijzer.nl/hackathon/api.php?q=".urlencode($data['title'])."&year=&output=xml");
            $kijkwijzerData = new \SimpleXMLElement($kijkwijzerData);
            $kijkwijzerData = response()->json($kijkwijzerData);

            //dd($kijkwijzerData);

            $directors = array_filter($credits["crew"], function($x) {
                return $x["job"] === "Director";
            });

            return view("movie.movie-info", compact("data", "similar", "trailers", "details", "credits", "directors", "kijkwijzerData"));
        } catch (Exception $e) {
            return view("movie.movie-info", "No data found");
        }
    }

}