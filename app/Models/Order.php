<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    protected $fillable = ['total'];

    public function movies(): HasManyThrough
    {
        return $this->hasManyThrough(
            Movie::class,
            MovieOrder::class,
            'order_id',
            'id',
            'id',
            'movie_id');
    }
}
