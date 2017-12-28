<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'site_id',
        'taxable_sales',
        'tds_percent',
        'reatation',
        'mobilization',
        'nbk',
        'tax',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id', 'id');
    }

    public function getTotalPayableAttribute()
    {
        return $this->taxable_sales -(($this->tds*$this->taxable_sales)/100)-(($this->reatation*$this->taxable_sales)/100)-(($this->nbk*$this->taxable_sales)/100)-(($this->mobilization*$this->taxable_sales)/100)+(($this->tax*$this->taxable_sales)/100);
    }
}
