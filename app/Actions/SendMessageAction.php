<?php

namespace App\Actions;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\UserChat;

class SendMessageAction
{
    public function send($message, $from, $to = 'admin')
    {
        $dialog = $this->getOrCreateDialog($from);

        if ($this->createMessage($message, $dialog->id, $from)) return $message;

        return 'Ошибка';

    }

    private function createMessage($text, $chatId, $from){

        $message = new ChatMessage();

        $message->message = $text;
        $message->from = $from;
        $message->chat_id = $chatId;

        return $message->save();

    }

    private function getOrCreateDialog($userId){

        if ($userDialog = UserChat::where('user_id', $userId)->first()) return $userDialog;

        else{

            $newChat = Chat::create();

            $userDialog = UserChat::create(['user_id' => $userId, 'chat_id' => $newChat->id]);

            return $userDialog;

        }

    }

}
