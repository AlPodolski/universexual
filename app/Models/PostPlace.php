<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostPlace extends Model
{

    protected $fillable = ['posts_id', 'place_id', 'city_id'];

    public $timestamps = false;
}
