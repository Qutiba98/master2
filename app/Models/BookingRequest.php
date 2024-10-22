<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory;

    protected $table = 'bookings_request'; // تأكد من أن الاسم هنا صحيح

    protected $fillable = [
        'user_id',
        'package_type_id',
        'duration',
        'price',
        'status', // تأكد من إضافة هذا الحقل إذا كان موجودًا
        'country', // إضافة حقل الدولة
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }
}
