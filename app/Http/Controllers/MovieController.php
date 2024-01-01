<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $baseURL = env('MOVIE_DB_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $MAX_BANNER = 3;
        $MAX_MOVIE_ITEM =10;
        $MAX_TV_SHOWS_ITEM = 10;
        $MAX_WELCOME = 1;

        // mengakses banner API
        $bannerResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        // Persiapkan variabel
        $bannerArray = [];

        // Periksa respon dari API
        if ($bannerResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $bannerResponse['results'];

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($bannerArray, $item);

                    if (count($bannerArray) == $MAX_BANNER) {
                        break;
                    }
                }
            }
        }

        // mengakses trending movie today API
        $trenTodayResponse = Http::get("{$baseURL}/trending/movie/day", [
            'api_key' => $apiKey,
        ]);

        // Persiapkan variabel
        $trenTodayArray = [];

        // Periksa respon dari API
        if ($trenTodayResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $trenTodayResponse->object()->results;

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($trenTodayArray, $item);

                    if (count($trenTodayArray) == $MAX_MOVIE_ITEM) {
                        break;
                    }
                }
            }
        }

        // mengakses trending movie week API
        $trenWeekResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        // Persiapkan variabel
        $trenWeekArray = [];

        // Periksa respon dari API
        if ($trenWeekResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $trenWeekResponse->object()->results;

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($trenWeekArray, $item);

                    if (count($trenWeekArray) == $MAX_MOVIE_ITEM) {
                        break;
                    }
                }
            }
        }

        // mengakses trending tv shows today API
        $trentvTodayResponse = Http::get("{$baseURL}/trending/tv/day", [
            'api_key' => $apiKey,
        ]);

        // Persiapkan variabel
        $trentvTodayArray = [];

        // Periksa respon dari API
        if ($trentvTodayResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $trentvTodayResponse->object()->results;

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($trentvTodayArray, $item);

                    if (count($trentvTodayArray) == $MAX_TV_SHOWS_ITEM) {
                        break;
                    }
                }
            }
        }

         // mengakses trending tv shows week API
         $trentvWeekResponse = Http::get("{$baseURL}/trending/tv/week", [
            'api_key' => $apiKey,
        ]);

        // Persiapkan variabel
        $trentvWeekArray = [];

        // Periksa respon dari API
        if ($trentvWeekResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $trentvWeekResponse->object()->results;

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($trentvWeekArray, $item);

                    if (count($trentvWeekArray) == $MAX_TV_SHOWS_ITEM) {
                        break;
                    }
                }
            }
        }

        // mengakses banner API
        $WelbannerResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        // Persiapkan variabel
        $WelbannerArray = [];

        // Periksa respon dari API
        if ($WelbannerResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $WelbannerResponse['results'];

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($WelbannerArray, $item);

                    if (count($WelbannerArray) == $MAX_WELCOME) {
                        break;
                    }
                }
            }
        }


        return view('home', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'banner' => $bannerArray,
            'welcomebanner' => $WelbannerArray,
            'trendingToday' => $trenTodayArray,
            'trendingWeek' => $trenWeekArray,
            'trendingtvToday' => $trentvTodayArray,
            'trendingtvWeek' => $trentvWeekArray
            
        ]);
    }

    public function movies (){
        $baseURL = env('MOVIE_DB_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $sortBy = "popularity.desc";
        $page =1;
        $minimalVolter =100;

        $movieResponse = Http::get("{$baseURL}/discover/movie",[
            'api_key' => $apiKey,
            'sort_by' => $sortBy,
            'vote_count.gte' => $minimalVolter,
            'page' => $page
        ]);

        $movieArray = [];

        if ($movieResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $movieResponse->object()->results;

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($movieArray, $item);

                }
            }
        }

        return view('movie',[
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'movies' => $movieArray,
            'sortBy' => $sortBy,
            'page' => $page,
            'minimalVolter' => $minimalVolter
        ]);
    }

    public function tvShows (){
        $baseURL = env('MOVIE_DB_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $sortBy = "popularity.desc";
        $page =1;
        $minimalVolter =100;

        $tvResponse = Http::get("{$baseURL}/discover/tv",[
            'api_key' => $apiKey,
            'sort_by' => $sortBy,
            'vote_count.gte' => $minimalVolter,
            'page' => $page
        ]);

        $tvArray = [];

        if ($tvResponse->successful()) {
            // Periksa apakah data kosong atau tidak
            $resultArray = $tvResponse->object()->results;

            if (!empty($resultArray)) {
                // Lakukan perulangan terhadap data respon
                foreach ($resultArray as $item) {
                    // Simpan data respon ke variabel baru
                    array_push($tvArray, $item);

                }
            }
        }

        return view('tv',[
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'tvShows' => $tvArray,
            'sortBy' => $sortBy,
            'page' => $page,
            'minimalVolter' => $minimalVolter
        ]);
    }

    public function search (){
        $baseURL = env('MOVIE_DB_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');

        return view('search',[
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            
        ]);
    }

    public function movieDetails($id){
        $baseURL = env('MOVIE_DB_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');

        $response = http::get("{$baseURL}/movie/{$id}", [
            'api_key' => $apiKey,
            'append_to_response' => 'videos'
        ]);

        $movieData = null;
        if($response->successful()){
            $movieData = $response->object();

        }

        

        return view('movie_details',[
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'movieData' => $movieData,
            
        ]);
    }

    public function tvDetails($id){
        $baseURL = env('MOVIE_DB_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');

        $response = http::get("{$baseURL}/tv/{$id}", [
            'api_key' => $apiKey,
            'append_to_response' => 'videos'
        ]);

        $tveData = null;
        if($response->successful()){
            $tvData = $response->object();

        }

        return view('tv_details',[
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'tvData' => $tvData
        ]);
    }
}


