<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\InventoryRequest;
use App\Models\InventoryLocation;


use App\Models\Booking;


class UserController extends Controller
{
    public function showHome()
    {
        // الحصول على عدد المستخدمين
        $usersCount = User::count();
    
        // جلب جميع الطلبات
        $inventoryRequests = InventoryRequest::with('user')->get();
    
        // جلب جميع الحجوزات
        $bookingsCount = Booking::count();
    
        // جلب جميع المواقع المخزنة (inventory_locations)
        $inventoryLocationsCount = InventoryLocation::count(); // أو استعلام مخصص حسب الحاجة
    
        return view('frontend.home', compact('usersCount', 'inventoryRequests', 'bookingsCount', 'inventoryLocationsCount'));
    }
        
}
