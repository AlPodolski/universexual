<?php

namespace App\Actions;

use Cookie;

class AddFavoriteToCookie
{
    public function add($id)
    {

        $data = array();

        if ($ids = Cookie::get('post_favorite')){

            $data = unserialize($ids);

            if (!in_array($id, $data)){

                $data[] = $id;

            }else{

                foreach ($data as $key => $item){

                    if ($item == $id) unset($data[$key]);

                }

            }

        }else{

            $data[] = $id;

        }

        $data = serialize($data);

        Cookie::queue('post_favorite', $data, 3600 * 24 * 31);
    }

    public static function check($id): bool
    {
        if ($ids = Cookie::get('post_favorite')){

            $data = unserialize($ids);

            if (in_array($id, $data)){

                return true;

            }

        }

        return false;

    }

}
