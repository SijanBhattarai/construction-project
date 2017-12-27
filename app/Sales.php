<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'heading',
        'site_id',
        'total_payable',
        'tds_percent',
        'mobilization',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id', 'id');
    }
}
