<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(InventoryLocation::class, 'location_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'inventory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
