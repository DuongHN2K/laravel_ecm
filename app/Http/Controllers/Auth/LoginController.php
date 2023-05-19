<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated()
    {
        if(Auth::user()->user_type == '1' || Auth::user()->user_type == '2') // 1 == Admin; 2 == Elder Admin
        {
            return redirect('/admin/dashboard')->with('status', 'Đăng nhập trang Admin thành công.');
        }
        else
        {
            if (Auth::user()->status == '1') // Trường hợp người dùng bị khóa
            {
                Auth::logout();
                return back()->with('status', 'Bạn đã bị khóa quyền truy cập! Vui lòng thử lại sau.');
            }
            else
            {
                if(Cart::count() > 0)
                {
                    return redirect('cart');
                }
                else
                {
                    return redirect('/');
                }
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
