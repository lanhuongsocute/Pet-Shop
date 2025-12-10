<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        // Lấy thông tin người dùng hiện tại (admin)
        $admin = Auth::user();

        // Truyền thông tin admin vào view
        return view('admin.profile', compact('admin'));
    }
}
