<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\InventoryRequest;
use App\Models\InventoryLocation;
use Carbon\Carbon;

class AdminController extends Controller
{

// admin
public function createUser()
    {
        $roles = Role::all();
        return view('admin.Create User.createuser', compact('roles'));
    }

    // validat admin
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'nullable|string|max:20|unique:users,number',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $this->create($request->all());

        return redirect()->route('admin.showusers')->with('success', 'User created successfully.');
    }

    // creted users
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'] ?? 1, 
        ]);
    }

    // all users 
    public function showUsers()
    {
        $users = User::all();
        return view('admin.Create User.showuser', compact('users'));
    }


public function dashboard()
{
    // Call createWearhouse1 to get the warehouse data
    $warehouseData = $this->createWearhouse1();

    // Extract the inventories and total space from the warehouse data
    $inventories = $warehouseData['inventories'];
    $totalSpaceByWarehouse = $warehouseData['totalSpaceByWarehouse'];

    $users = User::with('inventoryRequests')->get();

// Rank users based on the status of their associated requests
    $sortedUsers = $users->sortBy(function($user) {
        if ($user->inventoryRequests->isNotEmpty()) {
            return $user->inventoryRequests->min('status_id');
        } else {
            return 4;
        }
    });

    $monthlyRequests = InventoryRequest::selectRaw('COUNT(id) as total, MONTH(created_at) as month, YEAR(created_at) as year')
        ->where('status_id', 4) // accepted requsted
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

    return view('admin.dashboard', compact('sortedUsers', 'monthlyRequests', 'inventories', 'totalSpaceByWarehouse'));
}





public function someFunction()
{
    if (!$user->hasAccess()) {
        return redirect()->route('admin.home')->with('error', 'You do not have access to this page.');
    }

}




    // edit users
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.Create User.edituser', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'number' => 'required|string|max:20|unique:users,number,' . $id,
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'address' => $data['address'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        return redirect()->route('admin.edituser', $id)->with('success', 'User updated successfully!');
    }

    // show deleted users
    public function showTrashedUsers()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.trashedusers', compact('users'));
    }

    // deleted
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User soft deleted successfully.');
    }

    // deleted users
    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->back()->with('success', 'User permanently deleted successfully.');
    }

    // restore users
    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.trashedusers')->with('success', 'User restored successfully.');
    }

    // showRequest users
    public function showRequest()
    {
        // $users = User::all();
        $inventoryRequests = InventoryRequest::with('user')->get(); 
        // dd($inventoryRequests);
        return view('admin.showRequest', compact('inventoryRequests')); 
    }




public function updateRequest(Request $request, $id)
{
    $request->validate([
        'action' => 'required|in:accept,reject,pending',
        'size' => 'required',
        'location_id' => 'required',
    ]);

    $inventoryRequest = InventoryRequest::findOrFail($id);
    $updateSpace = Inventory::where('location_id', $request->location_id)->first();

    if ($request->action == 'accept') {
        $space = (int) $updateSpace->space;
        $size = (int) $request->size;

        if ($size > $space) {
            $inventoryRequest->status_id = 3; 
        } else {
            $inventoryRequest->status_id = 4; // accepted
            $updateSpace->space -= $size; 
            $updateSpace->total_space += $size;

            $inventoryRequest->start_date = Carbon::now();

            $inventoryRequest->end_date = $this->calculateEndDate($inventoryRequest->storage_duration);

            $updateSpace->save();
        }
    } elseif ($request->action == 'reject') {
        
        if ($inventoryRequest->status_id == 4) {

            $updateSpace->space += (int) $request->size;
            $updateSpace->save();
        }
        $inventoryRequest->status_id = 3; // rejected
    } elseif ($request->action == 'pending') {
        $inventoryRequest->status_id = 1; // pinding
    }


    if ($request->action == 'accept' && $inventoryRequest->status_id == 3) {

        $updateSpace->space -= (int) $request->size; 
        $updateSpace->total_space += (int) $request->size;

        $inventoryRequest->status_id = 4; 

        $inventoryRequest->start_date = Carbon::now();
        $inventoryRequest->end_date = $this->calculateEndDate($inventoryRequest->storage_duration);

        $updateSpace->save();
    }

    $inventoryRequest->save();

    return redirect()->route('admin.showRequest')->with('success', 'Request updated successfully.');
}

// function end date
private function calculateEndDate($storageDuration)
{
    switch ($storageDuration) {
        case '1 month':
            return Carbon::now()->addMonth();
        case '3 months':
            return Carbon::now()->addMonths(3);
        case '6 months':
            return Carbon::now()->addMonths(6);
        case '1 year':
            return Carbon::now()->addYear();
        default:
            return null;
    }
}



public function createWearhouse1()
{
    // Retrieve all inventories along with their associated location data
   $inventories = Inventory::with('location')->get();

    $totalSpaceByWarehouse = $inventories->groupBy('name')->map(function ($group) {
        return [
            'total_space' => $group->sum('total_space'),
            'inventory_name' => $group->first()->name,
            'location_name' => $group->first()->location->name, 
            'space' => $group->pluck('space'), 

        ];
    });    

    // dd($totalSpaceByWarehouse);
    return view('admin.CreateWearhouse.ShowWearhouse', compact('inventories', 'totalSpaceByWarehouse'));
}


public function createWearhouse()
{
    return view('admin.CreateWearhouse.createWearhouse');
}

public function InventoryLocation(Request $request)
{
    $request->validate([
        'Locationname' => 'required|string',
        'type' => 'required|string',
        'Inventoryname' => 'required|string',
        'space' => 'required|integer',
    ]);

    // Check for existing Location with the same name
    $existingLocation = InventoryLocation::where('name', $request->Locationname)->first();

    if ($existingLocation) {
        return back()->withErrors(['Locationname' => 'This name already exists']);
    }

    // Save Location data
    $location = new InventoryLocation();
    $location->name = $request->Locationname;
    $location->type = $request->type;
    $location->save();

    // Save Inventory data
    $inventory = new Inventory();
    $inventory->name = $request->Inventoryname;
    $inventory->location_id = $location->id;
    $inventory->space = $request->space;
    $inventory->total_space = 0;
    $inventory->save();

    // Flash success message
    session()->flash('success', 'Inventory created successfully!');

    return redirect()->route('admin.createWearhouse'); 
}


}
