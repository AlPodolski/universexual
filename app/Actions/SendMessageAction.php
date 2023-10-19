<?php

namespace App\Actions;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\UserChat;

class SendMessageAction
{
    public function send($message, $from, $relatedClass = null, $relatedId = null)
    {
        $dialog = $this->getOrCreateDialog($from);

        if ($this->createMessage($message, $dialog->chat_id, $from, $relatedClass, $relatedId)) return $message;

        return false;

    }

    public function createMessage($text, $chatId, $from, $relatedClass, $relatedId): bool
    {

        $message = new ChatMessage();

        $message->message = $text;
        $message->from = $from;
        $message->chat_id = $chatId;
        $message->related_class = $relatedClass;
        $message->related_id = $relatedId;

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
