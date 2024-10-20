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


public function dashboard()
{
    // Call createWearhouse1 to get the warehouse data
    $warehouseData = $this->createWearhouse1();

    // Extract the inventories and total space from the warehouse data
    $inventories = $warehouseData['inventories'];
    $totalSpaceByWarehouse = $warehouseData['totalSpaceByWarehouse'];

    $users = User::with('inventoryRequests')->get();

    // ترتيب المستخدمين بناءً على حالة الطلبات المرتبطة بهم
    $sortedUsers = $users->sortBy(function($user) {
        if ($user->inventoryRequests->isNotEmpty()) {
            return $user->inventoryRequests->min('status_id');
        } else {
            return 4;
        }
    });

    // إحصائيات الطلبات الشهرية مع السنة
    $monthlyRequests = InventoryRequest::selectRaw('COUNT(id) as total, MONTH(created_at) as month, YEAR(created_at) as year')
        ->where('status_id', 2) // جلب الطلبات المقبولة فقط
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
    // التحقق من صحة البيانات
    $request->validate([
        'action' => 'required|in:accept,reject,pending',
        'size' => 'required',
        'location_id' => 'required',
    ]);

    $inventoryRequest = InventoryRequest::findOrFail($id);
    $updateSpace = Inventory::where('location_id', $request->location_id)->first();

    // إذا كانت الحالة المطلوبة هي قبول الطلب
    if ($request->action == 'accept') {
        // تحويل القيم إلى أرقام
        $space = (int) $updateSpace->space;
        $size = (int) $request->size;

        // التحقق إذا كانت المساحة المطلوبة أكبر من المساحة المتاحة
        if ($size > $space) {
            // إذا كانت المساحة المطلوبة أكبر من المتاحة، قم برفض الطلب
            $inventoryRequest->status_id = 3; // رفض الطلب
        } else {
            // إذا تم قبول الطلب
            $inventoryRequest->status_id = 4; // الطلب مقبول
            $updateSpace->space -= $size; // طرح الحجم من المساحة المتاحة
            $updateSpace->total_space += $size;

            // تعيين تاريخ البداية (اليوم الحالي)
            $inventoryRequest->start_date = Carbon::now();

            // تعيين تاريخ النهاية بناءً على مدة التخزين
            $inventoryRequest->end_date = $this->calculateEndDate($inventoryRequest->storage_duration);

            // حفظ المساحة المحدثة
            $updateSpace->save();
        }
    } elseif ($request->action == 'reject') {
        // إذا كان الطلب مقبولًا، يمكنك تعيينه كمرفوض
        if ($inventoryRequest->status_id == 4) {
            // إعادة المساحة المتاحة
            $updateSpace->space += (int) $request->size;
            $updateSpace->save();
        }
        $inventoryRequest->status_id = 3; // الطلب مرفوض
    } elseif ($request->action == 'pending') {
        $inventoryRequest->status_id = 1; // الطلب "معلق"
    }

    // إذا كان الطلب مرفوضًا، يمكنك تغييره إلى مقبول
    if ($request->action == 'accept' && $inventoryRequest->status_id == 3) {
        // هنا نعيد المساحة المتاحة لأننا سنقبل الطلب مرة أخرى
        $updateSpace->space -= (int) $request->size; // استعادة المساحة المخصصة
        $updateSpace->total_space += (int) $request->size;

        // تعيين الحالة إلى مقبول
        $inventoryRequest->status_id = 4; // الطلب مقبول

        // تعيين تاريخ البداية وتاريخ النهاية كما فعلنا سابقًا
        $inventoryRequest->start_date = Carbon::now();
        $inventoryRequest->end_date = $this->calculateEndDate($inventoryRequest->storage_duration);

        // حفظ المساحة المحدثة
        $updateSpace->save();
    }

    // حفظ تحديثات الطلب
    $inventoryRequest->save();

    return redirect()->route('admin.showRequest')->with('success', 'Request updated successfully.');
}

// دالة لحساب تاريخ النهاية بناءً على مدة التخزين
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

    // حساب مجموع المساحات الإجمالية لكل مستودع واسترجاع الاسم
    $totalSpaceByWarehouse = $inventories->groupBy('name')->map(function ($group) {
        return [
            'total_space' => $group->sum('total_space'),
            'inventory_name' => $group->first()->name, // استرجاع اسم المستودع من جدول Inventory
            'location_name' => $group->first()->location->name, // استرجاع الاسم من جدول inventory_locations
            'space' => $group->pluck('space'), // المساحات الفردية

        ];
    });    // تمرير البيانات إلى الـ view
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
    return redirect()->route('admin.CreateWearhouse.ShowWearhouse')->with('success', 'Location and inventory added successfully.');
}







}
