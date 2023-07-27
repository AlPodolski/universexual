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

        }else{

            // URL, куда будет отправлен запрос
            $url = 'https://admin.sex-team.com/phones/get';

            $data = array(
                'city_id' => $city,
            );

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);

            if ($result) return $result;

            curl_close($ch);

        }

        return $post->phone;

    }
}
