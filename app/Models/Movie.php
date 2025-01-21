<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Number;

class Movie extends Model
{
    protected $fillable = ['title', 'price', 'tag_id'];

    /**
     * gets orders associated with the movie, using the movie_orders pivot table
     * @return HasManyThrough
     */
    public function orders()
    {
        return $this->hasManyThrough(
            Order::class,
            MovieOrder::class,
            'movie_id',
            'id',
            'id',
            'order_id');
    }

    /**
     * returns the full matching entry from the tag table
     * @return HasOne
     */
    public function tag()
    {
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }
}
