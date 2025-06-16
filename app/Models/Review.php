<?php

namespace App\Models;

use App\Actions\GenerateReviewMicro;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const MODERATION_STATUS = 0;
    const PUBLICATION_STATUS = 1;

    public $fillable = ['posts_id', 'name', 'text', 'rating', 'clean', 'is_happy'];

    public function post(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Post::class, 'id', 'posts_id');
    }

    public function micro($name)
    {
        return (new GenerateReviewMicro())->generate($this, $name);
    }

}
