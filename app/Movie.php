<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    /**
     * All swipes for this movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function swipes(): HasMany
    {
        return $this->hasMany(Swipe::class);
    }

    /**
     * List of like swipes for this movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(): HasMany
    {
        return $this->swipes()->liked();
    }

    /**
     * List of dislike swipes for this movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dislikes(): HasMany
    {
        return $this->swipes()->disliked();
    }
}
