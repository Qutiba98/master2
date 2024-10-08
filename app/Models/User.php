<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'number',
        'role_id',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'number_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'user_id', 'id');
    }

    public function deliveryRequests()
    {
        return $this->hasMany(DeliveryRequest::class, 'user_id');
    }

    public function inventoryRequests()
    {
        return $this->hasMany(InventoryRequest::class, 'user_id');
    }

    public function userProducts()
    {
        return $this->hasMany(UserProduct::class, 'user_id');
    }

    // Add any additional relationships or methods here as needed
}
