<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallRequest extends Model
{

    protected $table = 'call_requests';

    protected $fillable = [
        'posts_id',
        'name',
        'phone',
        'text',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'posts_id');
    }
}
