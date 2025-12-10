@extends('layouts.admin')

@section('title', 'Sửa Người dùng')

@section('content')
    <div class="container">
        <h1>Sửa Người dùng</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($user->image)
                    <p class="mt-2">Hình ảnh hiện tại:</p>
                    <img src="{{ asset($user->image) }}" alt="User Image"
                        style="width: 100px; height: 100px; object-fit: cover;">
                @endif
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Quyền</label>
                <select name="role" id="role" class="form-control">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Người dùng</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
