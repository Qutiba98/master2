<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackagePricing;

class PackagePricing extends Model
{
    use HasFactory;

    protected $table = 'package_pricing';

    protected $fillable = [
        'package_type_id', 
        'duration', 
        'price', 
        'space_dimensions', 
        'max_items', 
        'rental_duration', 
        'surveillance', 
        'delivery_service', 
        'usage_rules'
    ];


    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }
}
