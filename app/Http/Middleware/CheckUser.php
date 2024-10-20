<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        
        // تحقق من صلاحية المستخدم
        if ($user) {
            return $next($request);
            
        }


        // إعادة توجيه إذا لم يكن المستخدم لديه الصلاحية
        return redirect('/login')->with('error', 'You do not have access to this page.');
    }
    
}