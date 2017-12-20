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
        'cheque_no',
        'cheque_date',
        'of_no',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id', 'id');    }

    public function accounthead()
    {
        return $this->belongsTo('App\AccountHead', 'accounthead_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

}
