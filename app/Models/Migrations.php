<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migrations extends Model
{
    protected $table = 'migrations';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'migration',
        'batch'
    ];
}
