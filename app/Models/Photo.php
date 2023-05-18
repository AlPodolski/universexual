<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;

    protected $fillable = ['posts_id', 'file', 'type'];

    const GALLERY_TYPE = 1;
}
