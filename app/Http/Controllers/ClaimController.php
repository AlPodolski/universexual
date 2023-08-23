<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index(Request $request)
    {
        if (Claim::create($request->post())) return back()->with('success', 'Запрос отправлен');

        return back()->with('error', 'Ошибка');
    }
}
