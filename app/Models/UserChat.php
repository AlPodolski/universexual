<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'chat_id',
        'user_id',
    ];

    public function message(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'chat_id');
    }

    public function last(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ChatMessage::class, 'chat_id', 'chat_id')
            ->with('author')
            ->orderByDesc('id');
    }

    public function notRead(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'chat_id')
            ->where('status', ChatMessage::NOT_READ_STATUS)
            ->where('from', ChatMessage::ADMIN_ID);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
