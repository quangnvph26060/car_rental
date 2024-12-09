<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function authenticate(LoginUserRequest $request)
    {

        $credentials = $request->only(['email', 'password']);

        $remember = $request->boolean('remember');

        if (auth()->attempt($credentials, $remember)) {

            toastr()->success('Đăng nhập thành công.');

            return redirect()->route('admin.dashboard');
        } else {
            toastr()->error('Tài khoản hoặc mật khẩu không chính xác!');
            return back();
        }
    }

    public function logout()
    {

        auth()->logout();

        toastr()->success('Đăng xuất thành công.');

        return redirect()->route('login');
    }
}
