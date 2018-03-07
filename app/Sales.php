<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'site_id',
        'customer_id',
        'taxable_sales',
        'tds_percent',
        'retention',
        'mobilization',
        'bnk',
        'vat',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function getTotalPayableAttribute()
    {
        return ($this->taxable_sales - ($this->taxable_sales * ($this->retention + $this->tds_percent + $this->bnk)/100)+ $this->vatAmount -$this->mobilization);
    }

    public function getTdsAmountAttribute()
    {
        return ($this->tds_percent*$this->taxable_sales)/100;
    }

    public function getRetentionAmountAttribute()
    {
        return ($this->retention*$this->taxable_sales)/100;
    }

    public function getBNKAmountAttribute()
    {
        return ($this->bnk*$this->taxable_sales)/100;
    }

    public function getVatAmountAttribute()
    {
        return ($this->vat*$this->taxable_sales)/100;
    }

    
}
