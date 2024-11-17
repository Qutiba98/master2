<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dimensions']; 

    // تحديد العلاقة مع PackagePricing
    public function packagePricing()
    {
        return $this->hasMany(PackagePricing::class);
    }
}
