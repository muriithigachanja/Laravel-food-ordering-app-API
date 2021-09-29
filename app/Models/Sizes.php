<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $table = 'sizes';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'size',
        'meal',
        'price',
        'restaurant_id',
        'meal_name'
    ];

}
