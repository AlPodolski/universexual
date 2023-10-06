<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Post;
use App\Models\UserChat;

class IndexController extends Controller
{
    public function __invoke()
    {

        $posts = Post::where('user_id', auth()->id())
            ->with('metro', 'city')
            ->get();

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        return view(PATH.'.cabinet.index', compact('posts', 'notReadMessage'));
    }
}
