<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{

    const NOT_READ_STATUS = 0;
    const READ_STATUS = 1;
    const ADMIN_ID = 0;

    protected $fillable = [
        'chat_id',
        'from',
        'message',
        'status',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }

    public function file()
    {
        return $this->hasOne(File::class, 'id', 'related_id');
    }

}
