<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập cho giao diện web
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập cho giao diện web
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Kiểm tra quyền admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } else {
                Auth::logout();
                return back()->withErrors(['error' => 'Bạn không có quyền truy cập.']);
            }
        }

        return back()->withErrors(['error' => 'Thông tin đăng nhập không chính xác.']);
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Bạn đã đăng xuất.');
    }

    // Xử lý đăng ký API
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Đăng ký thành công!',
            'user' => $user,
        ], 201);
    }

    // Xử lý đăng nhập API
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Xác thực người dùng
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Kiểm tra xem model User đã tích hợp Sanctum chưa
            if (method_exists($user, 'createToken')) {
                // Tạo token

                $token = $user->createToken('API Token')->plainTextToken;

                return response()->json([
                    'status' => 'success',
                    'message' => 'Đăng nhập thành công!',
                    'user' => $user,
                    'token' => $token,
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Model User chưa tích hợp Sanctum. Vui lòng kiểm tra.',
            ], 500);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Email hoặc mật khẩu không chính xác.',
        ], 401);
    }
}
