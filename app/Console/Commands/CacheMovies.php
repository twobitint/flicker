<?php

namespace App\Console\Commands;

use App\Movie;
use Illuminate\Console\Command;
use Twobitint\TMDB\Facades\TMDB;

class CacheMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save movie data to local database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Use trending list.
        $tmdbMovies = TMDB::trending('movie');
        foreach ($tmdbMovies as $tm) {
            $movie = Movie::where('tmdb_id', $tm['id'])->first() ?? new Movie();
            $movie->tmdb_id = $tm['id'];
            $movie->tmdb_vote_count = $tm['vote_count'] ?? null;
            $movie->tmdb_vote_average = $tm['vote_average'] ?? null;
            $movie->title = $tm['title'] ?? null;
            $movie->release_date = $tm['release_date'] ?? null;
            $movie->original_language = $tm['original_language'] ?? null;
            $movie->original_title = $tm['original_title'] ?? null;
            $movie->tmdb_backdrop_path = $tm['backdrop_path'] ?? null;
            $movie->adult = $tm['adult'] ?? null;
            $movie->tmdb_overview = $tm['overview'] ?? null;
            $movie->tmdb_poster_path = $tm['poster_path'] ?? null;
            $movie->tmdb_popularity = $tm['popularity'] ?? null;
            $movie->save();
        }
    }
}
