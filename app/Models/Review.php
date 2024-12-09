<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const MODERATION_STATUS = 0;
    const PUBLICATION_STATUS = 1;

    public $fillable = ['posts_id', 'name', 'text', 'rating'];

    public function post(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Post::class, 'id', 'posts_id');
    }
}
