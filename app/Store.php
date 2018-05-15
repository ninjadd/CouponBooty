<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
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
        'name',
        'slug',
        'title',
        'body',
        'network_id',
        'manager_id',
        'image_url'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany('App\Offer')->orderBy('updated_at', 'desc');
    }

    public static function offersFromStores()
    {
        $store_ids = Offer::selectRaw('store_id')->whereNotNull('store_id')->groupBy('store_id')->pluck('store_id');

        return static::whereIn('id', $store_ids)->orderBy('name')->get();
    }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeByNumeric($query)
    {
        return $query
            ->orWhere('name', 'like', '0%')
            ->orWhere('name', 'like', '1%')
            ->orWhere('name', 'like', '2%')
            ->orWhere('name', 'like', '3%')
            ->orWhere('name', 'like', '4%')
            ->orWhere('name', 'like', '5%')
            ->orWhere('name', 'like', '6%')
            ->orWhere('name', 'like', '7%')
            ->orWhere('name', 'like', '8%')
            ->orWhere('name', 'like', '9%')
            ->orderBy('name');
    }

    /**
     * @param $query
     * @param $character
     * @return mixed
     */
    public function scopeByAlpha($query, $character)
    {
        return $query->where('name', 'like', $character.'%')->orderBy('name');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }

    /**
     * @param $ids
     * @return array|string
     */
    public function getNetworks($ids)
    {
        if (strlen($ids) > 1) {
            $ids = json_decode($ids);
            if (is_array($ids)) {
                $networks = Network::whereIn('id', $ids)->get();
                foreach ($networks as $network) {
                    $nets[] = $network->name;
                }
                $nets = implode(', ', $nets);
                return $nets;
            } else {
                $network = Network::where('id', $ids)->get();
                return $network[0]['name'];
            }
        } else {
            $network = Network::where('id', $ids)->get();
            return $network[0]['name'];
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function sideStore()
    {
        $cleanOffers = Offer::where('archive', 0)->pluck('store_id');
        return Store::archive(0)->whereIn('id', $cleanOffers)->orderBy('name', 'asc')->get();
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
}
