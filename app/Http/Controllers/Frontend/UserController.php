<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('frontend.user.profile');
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'postal_code' => ['required', 'digits:5'],
            'address' => ['required', 'string', 'max:499'],
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username,
            'phone_number' => $request->phone,
        ]);
        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'postal_code' => $request->postal_code,
                'address' => $request->address,
            ]
        );
        return redirect()->back()->with('message', 'Cập nhật thông tin thành công');
    }
}
