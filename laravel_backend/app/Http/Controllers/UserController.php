<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:user,admin',
        ]);

        $data = $request->all();

        // Lưu ảnh nếu có upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // Tạo tên file duy nhất
            $data['image'] = $file->storeAs('profile_images', $filename, 'public'); // Lưu file
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Người dùng đã được thêm!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:user,admin',
        ]);

        $data = $request->only(['username', 'email', 'phone', 'address', 'role']);

        // Cập nhật ảnh nếu có upload
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // Tạo tên file duy nhất
            $data['image'] = $file->storeAs('profile_images', $filename, 'public'); // Lưu file
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Xóa ảnh nếu tồn tại
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Người dùng đã bị xóa!');
    }
}
