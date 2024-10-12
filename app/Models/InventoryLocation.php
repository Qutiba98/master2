<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'status',

    ];

    public function location()
    {
        return $this->belongsTo(InventoryLocation::class);
    }
}
