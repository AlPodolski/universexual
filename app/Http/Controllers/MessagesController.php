<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Requests\StoreCallRequest;
use App\Models\CallRequest;
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

    public function phone(StoreCallRequest $request)
    {
        CallRequest::create($request->validated());

        return redirect()->back()->with('success', 'Ваше сообщение отправлено.');
    }

}
