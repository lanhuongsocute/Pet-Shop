@extends('layouts.admin')

@section('title', 'Hồ sơ Admin')

@section('content')
    <div class="container">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header text-center bg-success text-white">
                <h4>Hồ sơ Admin</h4>
            </div>
            <div class="card-body text-center">
                <img src="{{ $admin->image ? asset('storage/' . $admin->image) : asset('images/default-avatar.png') }}"
                    alt="Admin Avatar" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                <h5>{{ $admin->name }}</h5>
                <p class="text-muted">{{ $admin->email }}</p>
                <table class="table mt-3">
                    <tbody>
                        <tr>
                            <th scope="row">Tên</th>
                            <td>{{ $admin->username }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $admin->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Quyền</th>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
