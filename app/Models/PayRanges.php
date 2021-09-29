<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayRanges extends Model
{
    protected $table = 'pay_ranges';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'distance',
        'charges'
    ];

}
