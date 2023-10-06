<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\UserChat;

class ClaimController extends Controller
{
    public function index()
    {

        $chat = UserChat::where('user_id', auth()->user()->id)->with('message')->first();

        return view(PATH.'.cabinet.claim.index', compact('chat'));
    }
}
