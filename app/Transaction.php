<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'accounthead',
        'site',
        'amount',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function site()
    {
        return $this->hasOne('App\Site','name');
    }

    public function accounthead()
    {
        return $this->hasOne('App\AccountHead','accountname');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

}
