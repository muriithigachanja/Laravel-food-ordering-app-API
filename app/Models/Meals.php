<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    protected $table = 'meals';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'meal',
        'category',
        'description',
        'restaurant_id',
        'image',
        'wtime',
        'ratings_count',
        'ratings_people'
    ];
}
