<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;

class ClaimController extends Controller
{
    public function index()
    {
        return view(PATH.'.cabinet.claim.index');
    }
}
