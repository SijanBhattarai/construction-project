<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
