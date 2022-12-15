<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;

class MessagesController extends Controller
{

    public function store(MessageRequest $request)
    {
        $data = $request->validated();

        Message::create($data);

        return redirect('/post/'.$data['posts_id'])
            ->with('message', 'Сообщение отправлено');
    }

}
