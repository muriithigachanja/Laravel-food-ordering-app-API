<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartitems extends Model
{
    protected $table = 'cartitems';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'meal_id',
        'meal_name',
        'price',
        'quantity',
        'size',
        'flavour',
        'flavour_id',
        'order_id',
        'restaurant_id',
        'date',
        'address'
    ];
}
