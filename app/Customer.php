<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
        'name',
        'address',
        'email',
        'contact',
        'slug'

];
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function delete(array $options = array())
    {
        if ($this->image)
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }

    public function sales()
    {
        return $this->hasMany('App\Sales','customer_id');
    }
}
