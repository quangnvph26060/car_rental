<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
{
    try {
        // Lấy thông tin đăng nhập từ request
        $credentials = $request->only(['email', 'password']);

    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();


            if ($user->is_active == 1) {
                switch ($user->role_id) {
                    case 1:
                    case 2:
                        Log::info("Admin or Staff logged in", ['user_id' => $user->id]);
                        return redirect()->route('admin.dashboard')
                            ->with('successlogin', 'Chào mừng trở lại!');
                    case 3:
                        Log::info("Regular user logged in", ['user_id' => $user->id]);
                        return redirect()->route('page.home');
                    default:
                        Log::warning("Unknown role_id", ['role_id' => $user->role_id]);
                        Auth::logout();
                        return back()->withErrors(['email' => 'Tài khoản không có quyền truy cập.']);
                }
            } else {
                Log::warning("Inactive account attempted to log in", ['user_id' => $user->id]);
                return back()->withErrors(['email' => 'Tài khoản chưa được kích hoạt.']);
            }
        } else {
            // Sai thông tin đăng nhập
            Log::info("Login failed: Invalid credentials", ['email' => $request->email]);
            return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
        }
    } catch (\Exception $e) {
        // Ghi log lỗi nếu có vấn đề trong quá trình đăng nhập
        Log::error("Lỗi đăng nhập", ['error' => $e->getMessage()]);
        return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại sau.']);
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('form_login');
    }

    public function register(Request $request)
    {
        $tt = $request->all();
        $register = $this->userService->register($tt);
    }
}
