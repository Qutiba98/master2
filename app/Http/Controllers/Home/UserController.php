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
        // count users
        $usersCount = User::count();
    
        $inventoryRequests = InventoryRequest::with('user')->get();
    
        $bookingsCount = Booking::count();
    
        $inventoryLocationsCount = InventoryLocation::count(); 
    
        return view('frontend.home', compact('usersCount', 'inventoryRequests', 'bookingsCount', 'inventoryLocationsCount'));
    }
        
}
