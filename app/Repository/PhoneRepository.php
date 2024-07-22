<?php

namespace App\Repository;

use App\Models\Post;
use Cookie;

class PhoneRepository
{
    public function getPhone($city, $id)
    {
        $post = Post::where(['id' => $id])->first();

        if ($post->fake) {

            $post->phone_view_count = $post->phone_view_count + 1;

            $post->save();

            return $post->phone;
        }

        $realPost = Post::where(['city_id' => $city, 'fake' => Post::POST_REAL])
            ->where('publication_status', Post::POST_ON_PUBLICATION)
            ->where('last_phone_view', '<=', time() - 1200)
            ->where('user_id', '<>', 1108)
            ->orderByDesc('last_phone_view')
            ->first();

        if ($realPost) {

            $realPost->last_phone_view = time();

            $realPost->phone_view_count = $realPost->phone_view_count + 1;

            $realPost->save();

            return $realPost->phone;

        } else {

            $data = array();

            if ($ids = Cookie::get('user_phone_view')) {

                $data = unserialize($ids);

                foreach ($data as $item) {

                    if (key($item) == $id) return $item[$id];

                }

            }

            $phone = $this->getPhoneFromApi($city);

            $data[] = array($id => $phone);

            $data = serialize($data);

            Cookie::queue('user_phone_view', $data, 3600 * 24);

            return $phone;

        }

        return $post->phone;

    }

    private function getPhoneFromApi($city)
    {

        // URL, куда будет отправлен запрос
        $url = 'https://admin.sex-price.com/phones/get';

        $data = array(
            'city_id' => $city,
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        if ($result) {

            curl_close($ch);

            return $result;

        }


    }

}
