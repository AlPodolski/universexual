<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostMetro
 *
 * @property int $id
 * @property int $metros_id
 * @property int $posts_id
 * @property int $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro whereMetrosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMetro wherePostsId($value)
 * @mixin \Eloquent
 */
class PostMetro extends Model
{

    protected $fillable = ['posts_id', 'metros_id', 'city_id'];

    public $timestamps = false;
}
