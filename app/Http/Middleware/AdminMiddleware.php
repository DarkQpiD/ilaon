<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    // ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
    //if (!auth()->check()) {
        //return redirect('/');
    //}

    // ตรวจสอบ usertype ว่าเป็นแอดมินหรือไม่
    //if (auth()->user()->usertype === 'admin') {
        return $next($request);
    //}

    // กรณีผู้ใช้ไม่ใช่แอดมิน สามารถกำหนดท่าอื่น ๆ ตามต้องการ
    return redirect('/');
}
}
