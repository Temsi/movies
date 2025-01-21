<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieOrder extends Model
{
    public $timestamps = false;
    protected $fillable = ['order_id', 'movie_id'];
}
