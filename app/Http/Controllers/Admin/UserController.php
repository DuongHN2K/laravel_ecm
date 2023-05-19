<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::where('user_type', '!=', '2')->where('id', '!=', Auth::user()->id)->get();
        return view('admin.user.index', compact('user'));
    }

     /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        //
        $user = User::find($user_id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        //
        $user = User::find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        //
        $user = User::find($user_id);
        if($user)
        {
            $user->user_type = $request->user_type;
            $user->status = $request->status == true ? '1':'0';
            $user->update();
            return redirect('admin/users')->with('message', 'Cập nhật thành công');
        }
        return redirect('admin/users')->with('message', 'Không tìm được người dùng nào');
    }
}
