<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkLogin
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
        $check = Auth::check();
        if ($check) {
            return redirect()->route('index')->with('message', __('Vui lòng đăng xuất để sử dụng tính năng này'));
        } else {
            return $next($request);
        }
    }
}
