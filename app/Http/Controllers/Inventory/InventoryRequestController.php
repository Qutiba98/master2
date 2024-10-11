<?php

namespace App\Http\Controllers\Inventory;

use App\Models\InventoryRequest;
use App\Models\User; // تأكد من استيراد نموذج User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class InventoryRequestController extends Controller
{
    public function store(Request $request)
    {

        // تحقق من صحة المدخلات
        $request->validate([
            'governorate' => 'required|string',
            'housing_details' => 'required|string',
            'number' => 'required|string',
            'size' => 'required|string',
            'breakable' => 'required|string',
            'delivery_service' => 'required|string',
            'delivery_service' => 'nullable|string',
            'message' => 'nullable|string',
            'total_price' => 'nullable|string',
            'location_id' => 'required|in:1,2,3', // تأكد من أن القيمة إما 1 أو 2


        ]);

        $inventoryRequest = new InventoryRequest();
        $inventoryRequest->user_id = Auth::id(); // الحصول على معرف المستخدم الحالي

        // جلب الاسم من المستخدم المسجل دخوله
        $user = User::find(Auth::id()); // جلب بيانات المستخدم
        if ($user) {
            $inventoryRequest->name = $user->name; // تعيين الاسم للحقل name في الطلب
        } else {
            // في حال عدم العثور على المستخدم، يمكن تعيين اسم افتراضي أو معالجة الخطأ
            $inventoryRequest->name = 'اسم غير معروف';
        }

        // تعيين القيم الأخرى
        $inventoryRequest->status_id = 1; // يمكنك تعيين أي قيمة حسب الحاجة
        $inventoryRequest->package_id = 1; // تعيين قيمة للـ package_id (يمكنك تعديلها حسب الحاجة)
        $inventoryRequest->nationality_status_id = 1; // تعيين قيمة للحقل nationality_status_id
        $inventoryRequest->delivered_location_id = 1; // تعيين قيمة للحقل delivered_location_id
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


        $inventoryRequest->save(); // حفظ الطلب في قاعدة البيانات

        // إعادة التوجيه إلى صفحة عرض التخزين مع معرف الطلب
        return redirect()->route('storage.view', ['id' => $inventoryRequest->id]);
    }

    public function showStorageView($id)
    {
        // جلب الطلب من قاعدة البيانات
        $storageRequest = InventoryRequest::findOrFail($id);

        // عرض معلومات الطلب
        return view('frontend.storage.storageView', compact('storageRequest'));
    }

    public function showRequest()
    {
        $users = User::all();
        $inventoryRequests = InventoryRequest::all(); // جلب جميع الطلبات

        return view('admin.showRequest', compact('users', 'inventoryRequests'));
    }
}
