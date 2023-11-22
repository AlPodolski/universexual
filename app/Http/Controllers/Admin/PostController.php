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
use App\Repositories\DataRepository;
use App\Repositories\PostsRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {

        $posts = Post::orderBy('id', 'desc')
            ->with( 'city');

        if (!$request->get('all')) $posts->where('publication_status', Post::POST_ON_MODERATION);

        $posts = $posts->paginate(100);

        return view('admin.posts.index', compact('posts', 'request'));
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

        if ($post){

            $avatarPath = storage_path('app/public/' . $post->avatar);

            if (is_file($avatarPath)) unlink($avatarPath);

            if ($post->video) {

                $videoPath = storage_path('app/public/' . $post->video);

                if (is_file($videoPath)) unlink($videoPath);

            }

            foreach ($post->photo as $item){

                $path = (storage_path('app/public' . $item->file));

                if (is_file($path)){

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
