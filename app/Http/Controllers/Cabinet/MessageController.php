<?php

namespace App\Http\Controllers\Cabinet;

use App\Actions\SendMessageAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __invoke(Request $request)
    {
        $text = $request->post('message');

        return (new SendMessageAction())->send($text, auth()->user()->id);

    }
}
