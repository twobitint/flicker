<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->date('release_date')->nullable();
            $table->string('original_title')->nullable();
            $table->string('original_language')->nullable();
            $table->boolean('adult')->nullable();

            $table->unsignedInteger('tmdb_id')->unique();
            $table->unsignedInteger('tmdb_vote_count')->nullable();
            $table->decimal('tmdb_vote_average', 3, 1)->nullable();
            $table->string('tmdb_poster_path')->nullable();
            $table->string('tmdb_backdrop_path')->nullable();
            $table->text('tmdb_overview')->nullable();
            $table->decimal('tmdb_popularity', 7, 3)->nullable();

            $table->timestamps();
        });
    }
}
