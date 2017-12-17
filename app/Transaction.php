<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'accounthead_id',
        'site_id',
        'amount',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function site()
    {
        return $this->belongsTo('App\Site','id');
    }

    public function accounthead()
    {
        return $this->belongsTo('App\AccountHead','id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

}
