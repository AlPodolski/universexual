<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetroNear extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'metro_id',
        'near_metro_id',
    ];

    public function metro()
    {
        return $this->hasOne(Metro::class, 'id', 'near_metro_id')->with('filter');
    }

}
