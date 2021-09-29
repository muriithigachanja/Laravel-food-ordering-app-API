<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'name',
        'email',
        'phone',
        'city',
        'status'
    ];

}
