<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_id',
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @param $query
     * @param $id
     */
    public function scopeByOffer($query, $id)
    {
        $query->where('offer_id', $id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

    /**
     * @return string
     */
    public static function metaKeywords()
    {
        $today = date('Y-m-d');

        $cacheCategory = CacheCategory::where('day_created', $today);
        if ($cacheCategory->count() < 1) {
            $category_names = static::pluck('name')->unique()->toArray();
            $cache = new CacheCategory();
            $cache->day_created = $today;
            $cache->categories = implode(', ', $category_names);
            $cache->save();
        }

        $getCategories = CacheCategory::where('day_created', $today)->pluck('categories');


        return $getCategories[0];
    }

    /**
     * @return string
     */
    public static function autoFillKeywords()
    {
        $today = date('Y-m-d');
        $getCategories = CacheCategory::where('day_created', $today)->pluck('categories');
        $categories = $getCategories[0];
        $categories = explode(',', $categories);
        $categories = array_map('trim', $categories);
        return $categories;
    }
}