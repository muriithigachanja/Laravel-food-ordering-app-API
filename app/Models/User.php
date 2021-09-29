<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'phone_number',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'remember_token',        
        'role',
        'category',
        'restaurant_id',
        'created_by',
        'status',
        'id_no',
        'category',
        'created_by',
        'status',
        'license_no',
        'number_plate',
        'bank_name',
        'account_no',
        'api_token'
    ];

    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
    public function organizations()
    {
        return $this->belongsToMany('App\Models\Organization', 'organization_users', 'user_id', 'organization_recordid');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
