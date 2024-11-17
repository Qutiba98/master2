<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryRequest extends Model
{
    use HasFactory;

    protected $table = 'inventory_request'; // Specifies the table name

    protected $fillable = [
        'user_id',
        'package_id',
        'nationality_status_id',
        'delivered_location_id',
        'name',
        'status_id',
        'email',
        'governorate',        
        'housing_details',     
        'number',              
        'size',                
        'breakable',           
        'delivery_service',   
        'message',             
        'payment_method',      
        'storage_duration',    
        'total_price',         
        'location_id',         
    ];

    // Define relationships

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Inventory::class, 'location_id'); // Assuming 'Inventory' model is related to 'location_id'
    }

    // public function package()
    // {
    //     return $this->belongsTo(Package::class, 'package_id');
    // }

    // public function nationalityStatus()
    // {
    //     return $this->belongsTo(NationalityStatus::class, 'nationality_status_id');
    // }

    // public function status()
    // {
    //     return $this->belongsTo(Status::class, 'status_id');
    // }

    // public function deliveredLocation()
    // {
    //     return $this->belongsTo(Location::class, 'delivered_location_id');
    // }

    // Add any additional methods or relationships needed for the model
}
