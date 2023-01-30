<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function __invoke(ReviewRequest $reviewRequest)
    {
        $data = $reviewRequest->validated();

        $data['site_id'] = SITE_ID;

        Review::create($data);

        return back()->with('message', 'Отзыв добавлен');
    }
}
