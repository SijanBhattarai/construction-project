<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'location',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }
    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        if ($this->image)
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction','site_id');
    }
    public function sales()
    {
        return $this->hasMany('App\Sales','site_id');
    }
}
