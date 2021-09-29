<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flavours extends Model
{
    protected $table = 'flavours';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'flavour',
        'meal',
        'restaurant_id',
        'meal_name'
    ];
}
