<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Photo;
use App\Models\Place;
use App\Models\Post;
use App\Models\PostMetro;
use App\Models\PostPlace;
use App\Models\PostService;
use App\Models\PostTime;
use App\Models\Rayon;
use App\Models\Service;
use App\Models\Time;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $stream = \fopen(storage_path('import_09_12_2022.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $price = array(1000, 1500, 2000, 3000, 5000, 6000, 7000, 10000);

        $serviceList = Service::all();
        $placeList = Place::all();
        $timeList = Time::all();

        $posts = array();

        foreach ($records as $record) {

            if ($record['name']) {

                $posts[] = $record;

            }
        }

        $cityId = 1;
        $i = 0;

        foreach ($posts as $record){

            $post = new Post();

            $phone = preg_replace('/[^0-9]/', '', $record['phone']);

            $phone = '7'.mb_substr($phone, 1);

            $post->name = $record['name'];
            $post->age = $record['age'];
            $post->phone = $phone;
            $post->rost = $record['rost'];
            $post->ves = $record['weight'];
            $post->breast = $record['grud'];
            $post->about = strip_tags($record['anket-about']);
            $post->city_id = $cityId;
            $post->check_photo_status = rand(0,1);
            $post->price = $record['price'];
            $post->publication_status = 1;
            $post->user_id = 0;
            $post->url = '';
            $post->shoe_size = rand(36,40);
            $post->clothing_size = 0;

            $post->contacts_per_hour = rand(1, 3);

            $post->avatar = $record['mini'];
            if ($record['video']) $post->video = $record['video'];

            if ($post->save()) {

                if ($record['metro']) {

                    $dataList = explode(',', $record['metro']);

                    foreach ($dataList as $item) {

                        if ($temp = Metro::where(['value' => $item, 'city_id' => $cityId])->get()->first()) {

                            $postRelation = new PostMetro();
                            $postRelation->city_id = $cityId;
                            $postRelation->posts_id = $post->id;
                            $postRelation->metros_id = $temp->id;

                            $postRelation->save();

                        }

                    }

                }

                if ($record['gallery']) {

                    $dataList = explode(',', $record['gallery']);

                    foreach ($dataList as $item) {

                        $file = new Photo();

                        $file->posts_id = $post->id;
                        $file->file = '/files/' . $item;
                        $file->type = Photo::GALLERY_TYPE;

                        $file->save();

                    }

                }

                if (isset($record['intim']) and $record['intim']) {

                    if ($temp = IntimHair::where(['value' => $item])->get()->first()) {

                        $post->intim_hair_id = $temp->id;

                    }

                }

                if ($record['hair']) {

                    if ($temp = HairColor::where(['value' => $item])->get()->first()) {

                        $post->hair_color_id = $temp->id;

                    }

                }

                if (isset($record['rayon']) and $record['rayon']) {

                    if ($temp = Rayon::where(['value' => $item])->get()->first()) {

                        $post->rayon_id = $temp->id;

                    }

                }

                if (isset($record['ethnik']) and $record['ethnik']) {

                    if ($temp = National::where(['value' => $record['ethnik']])->get()->first()) {

                        $post->national_id = $temp->id;

                    }

                }

                foreach ($serviceList as $service) {

                    if (rand(0, 1)) {

                        $postService = new PostService();

                        $postService->posts_id = $post->id;
                        $postService->service_id = $service->id;
                        $postService->city_id = $cityId;

                        $postService->save();

                    }

                }

                foreach ($placeList as $item) {

                    if (rand(0, 1)) {

                        $postRelation = new PostPlace();
                        $postRelation->city_id = $cityId;
                        $postRelation->posts_id = $post->id;
                        $postRelation->place_id = $item->id;

                        $postRelation->save();

                    }

                }

                foreach ($timeList as $item) {

                    if (rand(0, 1)) {

                        $postRelation = new PostTime();
                        $postRelation->city_id = $cityId;
                        $postRelation->posts_id = $post->id;
                        $postRelation->times_id = $item->id;

                        $postRelation->save();

                    }

                }

                $post->save();

            }

            if ($i > 1) break;

            $i++;

            exit();

        }


    }

}
