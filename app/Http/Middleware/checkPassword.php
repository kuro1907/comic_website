<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkPassword
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
        $password       = $request->password;
        $repeatPassword = $request->repeatPassword;
        if ($password == $repeatPassword) {
            return $next($request);
        } else {
            return redirect()->route('register')->with('message', __('Vui lòng nhập mật khẩu khớp nhau'));
        }
    }
}
