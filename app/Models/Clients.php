<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'reset_token',
        'api_token'
    ];
}
