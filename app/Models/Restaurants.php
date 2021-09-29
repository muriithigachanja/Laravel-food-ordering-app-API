<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $table = 'restaurants';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'rname',
        'rphone',
        'mname',
        'mcphone',
        'cemail',
        'latitude',
        'longitude',
        'city',
        'website',
        'dpickup',
        'stax', 
        'dfee',
        'dfamount',
        'mffrom',
        'mfto',
        'safrom',
        'sato',
        'sufrom',
        'suto',
        'username',
        'password',
        'bank',  
        'account_no',
        'image'    
    ];

    public function meals()
    {
        return $this->hasMany('App\Models\Meals', 'restaurant_id', 'id');
    }

    public function cartitems()
    {
        return $this->hasMany('App\Models\Cartitems', 'restaurant_id', 'id');
    }
}
