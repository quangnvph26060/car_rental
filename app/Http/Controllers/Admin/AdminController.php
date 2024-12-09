<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('admin.user.index', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone?? '',
            'address' => $request->address ?? '',
        ];
        if ($request->hasFile('avatar')) $data['avatar'] =  saveImage($request, 'avatar', 'avatar_images');
        if ($request->password) $data['password'] = bcrypt($request->password);

        $user->update($data);
        return view('admin.user.index', compact('user'));
    }
}
