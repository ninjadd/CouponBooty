<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
        $category_names = static::pluck('name')->unique()->toArray();

        return implode(', ', $category_names);
    }

    /**
     * @return string
     */
    public static function autoFillKeywords()
    {
        return $category_names = static::selectRaw('lower(name) as name')->groupBy('name')->pluck('name');

//        return $category_names = static::pluck('name')->unique();
    }
}