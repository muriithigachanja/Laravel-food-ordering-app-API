<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'client_id',
        'restaurant_id',
        'status',
        'total',
        'sent'
    ];

    public function client()
    {
        return $this->belongsTo('App\User', 'client_id', 'id');
    }
}
