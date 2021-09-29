<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawalRequests extends Model
{
    protected $table = 'withdrawal_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'restaurant_id',
        'amount',
        'status',
        'reference',
        'date'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Model\Restaurants', 'restaurant_id', 'id');
    }
}
