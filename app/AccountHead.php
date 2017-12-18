<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    protected $fillable = [
        'slug',
        'accountname',
        'rate'
        ];
    public function getRouteKeyName()
    {
        return 'accountname';
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction','accounthead_id');
    }
}
