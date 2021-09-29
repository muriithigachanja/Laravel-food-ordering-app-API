<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DwithdrawalRequests extends Model
{
    protected $table = 'dwithdrawal_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'driver_id',
        'amount',
        'status',
        'reference',
        'date'
    ];

    public function driver()
    {
        return $this->belongsTo('App\User', 'driver_id', 'id');
    }
}
