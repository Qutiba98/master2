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

class AdminController extends Controller
{
    // عرض نموذج تسجيل مستخدم جديد
    public function createUser()
    {
        $roles = Role::all();
        return view('admin.Create User.createuser', compact('roles'));
    }

    // معالجة تقديم نموذج تسجيل مستخدم جديد
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

    // إنشاء مستخدم جديد
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'] ?? 1, // استخدام قيمة افتراضية إذا لم يتم تقديمها
        ]);
    }

    // عرض قائمة المستخدمين
    public function showUsers()
    {
        $users = User::all();
        return view('admin.Create User.showuser', compact('users'));
    }


    public function Dashboard()
    {
        $users = User::all(); // استرداد جميع المستخدمين
        return view('admin.Dashboard', compact('users')); // تمرير جميع المستخدمين إلى العرض
    }

public function showDashboard()
{
    $inventoryRequests = InventoryRequest::with('user')->get(); // جلب جميع الطلبات
    return view('admin.Dashboard', compact('inventoryRequests'));
}



public function someFunction()
{
    if (!$user->hasAccess()) {
        return redirect()->route('admin.home')->with('error', 'You do not have access to this page.');
    }

}




    // عرض نموذج تعديل مستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.Create User.edituser', compact('user', 'roles'));
    }

    // معالجة تقديم نموذج تعديل مستخدم
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

    // عرض قائمة المستخدمين المحذوفين
    public function showTrashedUsers()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.trashedusers', compact('users'));
    }

    // حذف ناعم لمستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User soft deleted successfully.');
    }

    // حذف نهائي لمستخدم
    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->back()->with('success', 'User permanently deleted successfully.');
    }

    // استعادة مستخدم محذوف
    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.trashedusers')->with('success', 'User restored successfully.');
    }

    // عرض قائمة المستخدمين
    public function showRequest()
    {
        // $users = User::all();
        $inventoryRequests = InventoryRequest::with('user')->get(); // جلب جميع الطلبات من جدول InventoryRequest
        // dd($inventoryRequests);
        return view('admin.showRequest', compact('inventoryRequests')); // تمرير كل من المستخدمين والطلبات
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
            // Cast both space and size to integers
            $space = (int) $updateSpace->space;
            $size = (int) $request->size;

            // Check if the requested size is greater than available space
            if ($size > $space) {
                $inventoryRequest->status_id = 3; // Set status to "rejected"
            } else {
                $inventoryRequest->status_id = 2; // Set status to "in progress"
                $updateSpace->space = $space - $size; // Subtract size from space
                $updateSpace->total_space += $size;

                // Save the updated space
                $updateSpace->save(); // This line is crucial for saving changes
            }
        } elseif ($request->action == 'reject') {
            $inventoryRequest->status_id = 3; // Set status to "rejected"
        } elseif ($request->action == 'pending') {
            $inventoryRequest->status_id = 1; // Set status to "pending"
        }

        // Save the inventory request update
        $inventoryRequest->save();

        return redirect()->route('admin.showRequest')->with('success', 'Request updated successfully.');
    }


public function createWearhouse1()
{
    // Retrieve all inventories along with their associated location data
    $inventories = Inventory::with('location')->get();

    // حساب مجموع المساحات لكل مستودع
    $totalSpaceByWarehouse = $inventories->groupBy('location_id')->map(function ($group) {
        return $group->sum('space');
    });

    // تمرير البيانات إلى الـ view
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
    // Check for existing Inventory with the same name
    $existingInventory = Inventory::where('name', $request->Inventoryname)->first();

    if ($existingLocation) {
        return back()->withErrors(['Locationname' => 'This name already exists in the database.']);
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

    // Redirect to view with success message
    return redirect()->route('admin.CreateWearhouse.createWearhouse')->with('success', 'Location and inventory added successfully.');
}







}
