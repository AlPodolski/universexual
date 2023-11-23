<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->with('countPost');

        $dataProvider = new EloquentDataProvider($users);

        $gridData = [
            'dataProvider' => $dataProvider,
            'rowsPerPage' => 100,
            'columnFields' => [
                'id',
                'email',
                [
                    'attribute' => 'name',
                    'label' => 'Имя',
                    'format' => 'html',
                    'value' => function ($user) {

                        /* @var $user User */

                        return '<a target="_blank" href="/admin/users/'.$user->id.'/edit">' . $user->name . '<a>';
                    }
                ],
                [
                    'attribute' => 'cash',
                    'label' => 'Счет',
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Создан',
                ],
                [
                    'attribute' => 'countPost',
                    'label' => 'Анкет',
                    'value' => function ($post) {
                        /* @var $post User */
                        return $post->countPost->count();
                    }
                ],
                [
                    'attribute' => 'countPostPublication',
                    'label' => 'Анкет на публикации',
                    'value' => function ($post) {
                        /* @var $post User */
                        return $post->countPost->count();
                    }
                ],
            ]
        ];

        return view('admin.user.index', compact('users', 'gridData'));
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
