<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\UserChat;

class ClaimController extends Controller
{
    public function index()
    {

        $chat = UserChat::where('user_id', auth()->user()->id)->with('message')->first();

        if ($chat)
            ChatMessage::where(['chat_id' => $chat->chat_id, 'from' => ChatMessage::ADMIN_ID])
                ->update(['status' => ChatMessage::READ_STATUS]);

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        return view(PATH.'.cabinet.claim.index', compact('chat', 'notReadMessage'));
    }
}
