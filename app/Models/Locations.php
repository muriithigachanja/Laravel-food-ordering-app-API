<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'city',
        'slug'  
    ];
}
