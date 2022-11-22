<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function __invoke(ReviewRequest $reviewRequest)
    {
        $data = $reviewRequest->validated();

        Review::create($data);

        return redirect('/post/'.$data['posts_id'] )->with('message', 'Отзыв добавлен');
    }
}
