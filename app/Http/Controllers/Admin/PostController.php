<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Place;
use App\Models\Post;
use App\Models\Rayon;
use App\Models\Service;
use App\Models\Tarif;
use App\Models\Time;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class PostController extends Controller
{

    public function index(Request $request)
    {

        $posts = Post::query()->with('city');

        $dataProvider = new EloquentDataProvider($posts);

        $gridData = [
            'dataProvider' => $dataProvider,
            'rowsPerPage' => 100,
            'columnFields' => [
                'id',
                [
                    'attribute' => 'name',
                    'label' => 'Имя',
                ],
                [
                    'attribute' => 'city_id',
                    'label' => 'Город',
                    'value' => function ($post) {
                        /* @var $post Post */
                        return $post->city->city . ' ' . $post->city->id;
                    }
                ],
                'url',
                [
                    'attribute' => 'publication_status',
                    'label' => 'Статус',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Post */

                        if ($row->publication_status == \App\Models\Post::POST_DONT_PUBLICATION) return 'Не публикуется';

                        if ($row->publication_status == \App\Models\Post::POST_ON_PUBLICATION) return 'Публикуется';

                        if ($row->publication_status == \App\Models\Post::POST_ON_MODERATION)
                            return '<div class="check"
                                 data-url="/admin/posts/check"
                                 onclick="check(this)" data-id="' . $row->id . '">
                            Подтвердить
                            </div>';

                    }
                ],
                [
                    'label' => 'avatar',
                    'format' => 'html',
                    'value' => function ($row) {
                        /* @var $row Post */
                        return '<img loading="lazy" src="/139-185/thumbs/' . $row->avatar . '" alt="">';

                    },
                ],
                [
                    'attribute' => 'phone_view_count',
                    'label' => 'Прсм. телефона',
                ],
            ]
        ];

        return view('admin.posts.index', compact('posts', 'request', 'dataProvider', 'gridData'));
    }

    public function check(Request $request)
    {

        $post = Post::findOrFail($request->post('id'));

        $post->publication_status = Post::POST_ON_PUBLICATION;
        $post->save();

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

        $post = Post::findOrFail($id);

        $serviceList = Service::all();
        $metroList = Metro::all();
        $rayonList = Rayon::all();

        $timeList = Time::all();
        $placeList = Place::all();
        $nationalList = National::all();
        $hairColorList = HairColor::all();
        $intimHairList = IntimHair::all();

        $tarifList = Tarif::all();

        return view('admin.posts.edit', compact('post', 'serviceList', 'metroList', 'rayonList',
            'timeList', 'placeList', 'nationalList', 'hairColorList', 'intimHairList', 'tarifList'));

    }

    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);

        $data = $request->post();

        if ($post->update($data)) {

            return redirect('/admin/posts')
                ->with(['success' => 'Запись сохранена']);

        }

        return back()
            ->withErrors(['msg' => 'Ошибка'])
            ->withInput();
    }

    public function destroy($id)
    {
    }

    public function delete(Request $request)
    {
        $id = $request->post('id');

        $post = Post::where(['id' => $id])->with('photo')->first();

        if ($post) {

            $avatarPath = storage_path('app/public/' . $post->avatar);

            if (is_file($avatarPath)) unlink($avatarPath);

            if ($post->video) {

                $videoPath = storage_path('app/public/' . $post->video);

                if (is_file($videoPath)) unlink($videoPath);

            }

            foreach ($post->photo as $item) {

                $path = (storage_path('app/public' . $item->file));

                if (is_file($path)) {

                    unlink($path);

                    $item->delete();

                }

            }

            \DB::table('post_times')->where('posts_id', $post->id)->delete();
            \DB::table('post_metros')->where('posts_id', $post->id)->delete();
            \DB::table('post_places')->where('posts_id', $post->id)->delete();
            \DB::table('post_services')->where('posts_id', $post->id)->delete();
            \DB::table('reviews')->where('posts_id', $post->id)->delete();

            $post->delete();

        }

    }

}
