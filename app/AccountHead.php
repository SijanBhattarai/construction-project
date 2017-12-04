<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    protected $fillable = [

      'name',
        'slug'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
