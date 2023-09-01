<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $redirects = Redirect::orderByDesc('id')->paginate(40);

        return view('admin.redirect.index', compact('redirects'));
    }

    public function create()
    {
        return view('admin.redirect.create');
    }

    public function store(Request $request)
    {
        if ($redirect = Redirect::create($request->post())) {

            $msg = 'Готово';

        }else{

            $msg = 'Ошибка';

        }

        return back()
            ->with(['msg' => $msg]);

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
