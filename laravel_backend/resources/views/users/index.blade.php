@extends('layouts.admin')

@section('title', 'Danh sách Người dùng')

@section('content')
    <div class="container">
        <h1>Danh sách Người dùng</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Thêm Người dùng</a>
        <table class="table table-bordered">
            <thead class="bg-success text-white">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if ($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
