<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
 * @property int $national_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereNationalId($value)
 * @property int $hair_color_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereHairColorId($value)
 * @property int $intim_hair_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIntimHairId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostService[] $service
 * @property-read int|null $service_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostMetro[] $metro
 * @property-read int|null $metro_count
 */
class Post extends Model
{

    const INDI_TYPE = 0;
    const SALON_TYPE = 1;

    public function service(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostService::class, 'posts_id', 'id')
            ->join('services', 'service_id', '=', 'services.id');

    }

    public function metro(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostMetro::class, 'posts_id', 'id')
            ->join('metros', 'metros_id', '=', 'metros.id')
            ->join('filters', 'related_id', '=', 'metros.id')
            ->where('filters.parent_class', Metro::class)
            ->select('metros.x','metros.y', 'filters.url as metro_url', 'metros.value as metro_value', 'posts_id');
    }

    public function place(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostPlace::class, 'posts_id', 'id')
            ->join('places', 'place_id', '=','places.id')
            ->select('places.url as places_url','places.id', 'places.value as places_value', 'posts_id');
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function rayon(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Rayon::class, 'id', 'rayon_id')
            ->with('filter');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class, 'posts_id', 'id');
    }

    public function photo(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Photo::class, 'posts_id', 'id');
    }

    public function getAltAttribute(): string
    {
        $result = $this->name .',';

        if ($metro = $this->metro->first()) $result .= ' метро ' . $metro->metro_value;
        if ($this->city) $result .= ' Г. ' . $this->city->city;

        return $result;

    }

    public function getTitleAttribute(): string
    {
        $result = 'Фото проститутки '.$this->name;

        if ($this->city) $result .= ' в городе ' . $this->city->city;

        return $result;

    }
}
