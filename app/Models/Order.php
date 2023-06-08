<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const WAIT = 1;
    const FINISH = 2;
}
