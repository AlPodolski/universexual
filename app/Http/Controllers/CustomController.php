<?php

namespace App\Http\Controllers;

class CustomController extends Controller
{
    public function politic($city)
    {
        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);
        $meta = ['title' => 'Политика конфиденциальности', 'des' => 'Политика конфиденциальности сайта prostitutki.nl'];

        return view('custom.politic', compact('meta', 'data'));
    }
}
