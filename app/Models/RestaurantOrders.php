<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantOrders extends Model
{
    protected $table = 'restaurant_orders';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'order_id',
        'restaurant_id',
        'status',
        'delivery_description',
        'latitude',
        'longitude',
        'receiptno',
        'sent',
        'delivery_status',
        'driver_id',
        'client_id', 
        'dtime',
        'dreason',
        'refunds',
        'balances',
        'commission',
        'admin_commission',
        'rating_status'
    ];

    public function cartitem()
    {
        return $this->belongsTo('App\Model\Cartitems', 'order_id', 'order_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Model\Orders', 'order_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Model\Restaurants', 'restaurant_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo('App\User', 'driver_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\User', 'client_id', 'id');
    }


}
