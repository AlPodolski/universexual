<?php

namespace App\Http\Controllers;

use App\Repository\CityRepository;
use App\Repository\DataRepository;
use App\Repository\MetaRepository;
use App\Repository\PostRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected DataRepository $dataRepository;
    protected PostRepository $postRepository;
    protected CityRepository $cityRepository;
    protected MetaRepository $metaRepository;

    protected $limit;
    protected $sort;

    public function __construct()
    {
        $this->dataRepository = new DataRepository();
        $this->postRepository = new PostRepository();
        $this->cityRepository = new CityRepository();
        $this->metaRepository = new MetaRepository();

        $this->limit = \Cookie::get('post_limit') ?? 15;
        $this->sort = \Cookie::get('sort') ?? 'default';
    }
}
