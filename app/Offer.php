<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type_id',
        'title',
        'url',
        'image_url',
        'body',
        'coupon',
        'archive',
        'start_date',
        'end_date',
        'store_id',
        'network_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param $query
     * @param int $val
     * @return mixed
     */
    public function scopeArchive($query, $val=0)
    {
        return $query->where('archive', $val);
    }

    /**
     * @param $query
     * @param $search_text
     * @return mixed
     */
    public function scopeSearch($query, $search_text)
    {
        $categories = Category::where('name', 'like', '%'.$search_text.'%')->pluck('offer_id')->unique();

        if ($categories->count() > 0) {
            $query->whereIn('id', $categories);
        }

        $types = Type::where('label', 'like', '%'.$search_text.'%')->pluck('id');

        if ($types->count() > 0) {
            $query->whereIn('type_id', $types);
        }

        $offers = Offer::where('body', 'like', '%'.$search_text.'%')
            ->orWhere('title', 'like', '%'.$search_text.'%')->pluck('id');

        if ($offers->count() > 0) {
            $query->whereIn('id', $offers);
        }

        return $query;
    }
}
