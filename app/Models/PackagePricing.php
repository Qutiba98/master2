<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackagePricing;

class PackagePricing extends Model
{
    use HasFactory;

    // تحديد اسم الجدول
    protected $table = 'package_pricing'; // تأكد من أن الاسم هنا صحيح

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


    // العلاقة مع نموذج PackageType
    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }
}
