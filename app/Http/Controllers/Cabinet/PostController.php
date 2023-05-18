<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Photo;
use App\Models\PostMetro;
use App\Models\PostPlace;
use App\Models\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    }

    public function create($city)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);

        return view(PATH.'.cabinet.post.add', compact('data'));
    }

    public function store(Request $request)
    {

        $post = new Post();

        $post->site_id = SITE_ID;
        $post->user_id = auth()->id();
        $post->fake = Post::POST_REAL;
        $post->publication_status = Post::POST_ON_MODERATION;

        $post->fill($request->post());

        if ($post->save()){

            $post->url = \Str::slug($post->name.'-').$post->id;

            $dir = \substr(\md5($post->url), 0, 3);

            $photo = array();

            if ($request->file('anketPhotos')) foreach ($request->file('anketPhotos') as $item) {

                $photo[] = [
                    'posts_id' => $post->id,
                    'file' => '/' . $item->store('/uploads/'.$dir, 'public'),
                    'type' => Photo::GALLERY_TYPE
                ];

            }

            if ($place = $request->post('place')){

                foreach ($place as $placeItem){

                    PostPlace::create([
                        'place_id' => $placeItem,
                        'posts_id' => $post->id,
                        'city_id' => $post->city_id
                    ]);

                }

            }

            if ($metroId = $request->post('metro')){

                PostMetro::create([
                    'metros_id' => $metroId,
                    'posts_id' => $post->id,
                    'city_id' => $post->city_id
                ]);

            }

            foreach ($request->post() as $postServiceId => $postServiceValue){

                if (strpos($postServiceId, 'service-') !== false and $postServiceValue != 4){

                    $serviceId = str_replace('service-', '', $postServiceId);

                    $serviceData = [
                        'posts_id' => $post->id,
                        'service_id' => $serviceId,
                        'city_id' => $post->city_id
                    ];

                    if ($postServiceValue == 2){

                        $serviceData['sympathy'] = 1;

                    }

                    if ($postServiceValue == 3){

                        $serviceData['pay'] =  1;

                    }

                    PostService::create($serviceData);

                }

            }

            $avatar = $request->file('photo')->store('/uploads/'.$dir, 'public');

            $post->avatar = $avatar;

            if ($photo) foreach ($photo as $item) {
                Photo::create($item);;
            }

            $post->save();

        }

        if ($request->post('add_more')) return redirect('/cabinet/post/create');

        return redirect('/cabinet');

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
