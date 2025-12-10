@extends('layouts.admin')

@section('title', 'Danh mục Thú cưng')

@section('content')
    <div class="container">
        <h1>Danh mục Thú cưng</h1>
        <a href="{{ route('pet_categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead class="bg-success text-white">
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pet_categories.edit', $category->id) }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('pet_categories.destroy', $category->id) }}" method="POST"
                                class="d-inline">
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
