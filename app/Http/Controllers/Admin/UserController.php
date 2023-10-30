<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(50);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $data = $request->post();

        if ($user->update($data)) {

            return redirect('/admin/users')
                ->with(['success' => 'Запись сохранена']);

        }

        return back()
            ->withErrors(['msg' => 'Ошибка'])
            ->withInput();
    }

    public function destroy($id)
    {
    }
}
