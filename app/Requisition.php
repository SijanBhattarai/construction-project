<?php

namespace App;
use App\Site;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable =[
      'site_id',
      'issued_to',
      'particulars',
      'quantity',
      'unit',
      'remarks'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function site()
    {
        return $this->hasOne('App\Site', 'id', 'site_id');
    }
}
