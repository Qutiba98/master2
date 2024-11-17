<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\InventoryRequest; 
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $inventoryRequests = InventoryRequest::where('user_id', $user->id)->get();

        return view('frontend.profile.profile', [
            'user' => $user,
            'inventoryRequests' => $inventoryRequests,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'address' => 'nullable|string|max:255',
            'number' => 'required|string|max:20|unique:users,number,' . Auth::id(),            
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->number = $request->input('number');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
