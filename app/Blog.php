<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Blog extends Model
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
        'title',
        'title_slug',
        'body',
        'archive'
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
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\BlogComment');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeArchived($query)
    {
        return $query->where('archive', 1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUnarchived($query)
    {
        return $query->where('archive', 0);
    }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('title_slug', $slug);
    }

    /**
     * @param $query
     * @param $filter
     */
    public function scopeBlogFilter($query, $filter)
    {
        if ($month = $filter['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filter['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function sideBar()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) posts')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }

}
