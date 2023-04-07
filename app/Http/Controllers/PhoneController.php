<?php

namespace App\Http\Controllers;

use App\Repository\PhoneRepository;
use Illuminate\Http\Request;

class PhoneController extends Controller
{

    private $phoneRepository;

    public function __construct()
    {
        $this->phoneRepository = new PhoneRepository();
    }

    public function __invoke(Request $request)
    {
        $postId = $request->post('id');
        $cityId = $request->post('id');

        $phone = $this->phoneRepository->getPhone($cityId, $postId);

        return $phone;

    }
}
