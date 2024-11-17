<?php

namespace App\Http\Controllers\Inventory;

use App\Models\InventoryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class InventoryRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'governorate' => 'required|string',
            'housing_details' => 'required|string',
            'number' => 'required|string',
            'size' => 'required|string',
            'breakable' => 'required|string',
            'delivery_service' => 'required|string',
            'message' => 'nullable|string',
            'total_price' => 'nullable|string',
            'location_id' => 'required|in:1,2,3', 
        ]);

        try {
            $inventoryRequest = new InventoryRequest();
            $inventoryRequest->user_id = Auth::id(); 

            $user = User::find(Auth::id());
            $inventoryRequest->name = $user ? $user->name : 'users not found ';

            // تعيين القيم الأخرى
            $inventoryRequest->status_id = 1;
            $inventoryRequest->package_id = 1;
            $inventoryRequest->nationality_status_id = 1;
            $inventoryRequest->delivered_location_id = 1;
            $inventoryRequest->governorate = $request->input('governorate');
            $inventoryRequest->housing_details = $request->input('housing_details');
            $inventoryRequest->number = $request->input('number');
            $inventoryRequest->size = $request->input('size');
            $inventoryRequest->breakable = $request->input('breakable');
            $inventoryRequest->delivery_service = $request->input('delivery_service');
            $inventoryRequest->storage_duration = $request->input('storage_duration');
            $inventoryRequest->message = $request->input('message');
            $inventoryRequest->payment_method = $request->input('payment_method');
            $inventoryRequest->total_price = $request->input('total_price');
            $inventoryRequest->location_id = $request->input('location_id');

            $inventoryRequest->save(); 

            return redirect()->route('storage.view', ['id' => $inventoryRequest->id]);
        } catch (QueryException $e) {
            return back()->withErrors(['error' => 'There are no warehouses available currently.']);
        }
    }

    public function showStorageView($id)
    {
        $storageRequest = InventoryRequest::findOrFail($id);
        return view('frontend.storage.storageView', compact('storageRequest'));
    }

    public function showRequest()
    {
        $users = User::all();
        $inventoryRequests = InventoryRequest::all();
        return view('admin.showRequest', compact('users', 'inventoryRequests'));
    }
}
