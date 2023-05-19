<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->user_type == 1 || Auth::user()->user_type == '2')
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('status', "Bạn không phải Admin. Truy cập bị từ chối");
            }
        }
        else
        {
            return redirect('/login')->with('status', "Vui lòng đăng nhập");
        }
    }
}
