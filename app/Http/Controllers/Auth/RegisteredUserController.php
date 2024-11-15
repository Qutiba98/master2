<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    // تفعيل middleware للتحقق من أن المستخدم ليس مسجلاً بالفعل
    public function __construct()
    {
        $this->middleware('guest');
    }

    // عرض نموذج التسجيل
    public function showRegistrationForm()
    {
        return view('login.Register.register'); // تأكد من صحة المسار للملف
    }

    // التحقق من صحة البيانات المدخلة
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required', 'string', 'max:20', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // إنشاء مستخدم جديد
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role_id' => 1,
        ]);
    }

    // معالجة التسجيل بعد تقديم النموذج
    public function register(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // إنشاء المستخدم الجديد
        $user = $this->create($request->all());

        // إضافة رسالة النجاح للجلسة
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
        
    }
}
