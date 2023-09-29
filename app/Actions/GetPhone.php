<?php

namespace App\Actions;

use Cookie;

class GetPhone
{
    public function get($city, $id)
    {
        $data = array();

        if ($ids = Cookie::get('user_phone_view')){

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

        Cookie::queue('user_phone_view', $data, 3600 * 24);
    }
}
