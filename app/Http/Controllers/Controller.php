<?php

namespace App\Http\Controllers;

use App\Repository\DataRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $dataRepository;

    public function __construct()
    {
        $this->dataRepository = new DataRepository();
    }
}
