<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloudZone extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'zone',
    ];
}
