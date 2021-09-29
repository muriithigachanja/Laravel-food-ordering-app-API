<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantUsers extends Model
{
    protected $table = 'restaurantusers';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'firstname',
        'lastname',
        'role',
        'email',
        'restaurant_id',
        'email_verified_at',
        'password',
        'remember_token'
    ];
}
