<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $url
 * @property string $avatar
 * @property string $about
 * @property int $price
 * @property int $publication_status
 * @property int $age
 * @property int $rost
 * @property int $ves
 * @property int $breast
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBreast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublicationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereVes($value)
 * @mixin \Eloquent
 * @property int $city_id
 * @property string $phone
 * @property int $shoe_size
 * @property int $clothing_size
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereClothingSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereShoeSize($value)
 * @property int $contacts_per_hour
 * @property int $not_younger
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContactsPerHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereNotYounger($value)
 */
class Post extends Model
{
}
