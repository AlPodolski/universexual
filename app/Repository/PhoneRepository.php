<?php

namespace App\Repository;

use App\Models\Post;

class PhoneRepository
{
    public function getPhone($city, $id)
    {
        $post = Post::where(['id' => $id])->first();

        if ($post->fake) return $post->phone;

        $realPost = Post::where(['city_id' => $city, 'fake' => Post::POST_REAL])
            ->orderByDesc('last_phone_view')
            ->first();

        if ($realPost) {

            $realPost->last_phone_view = time();

            $realPost->save();

            return $realPost->phone;

        }

        return $post->phone;

    }
}
