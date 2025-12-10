@extends('layouts.admin')

@section('title', 'Danh sách danh mục thức ăn thú cưng')

@section('content')
    <div class="container">
        <h1>Danh sách danh mục thức ăn thú cưng</h1>
        <a href="{{ route('pet-food-categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="bg-success text-white">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
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
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                    width="50">
                            @else
                                Không có hình ảnh
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pet-food-categories.edit', $category->id) }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('pet-food-categories.destroy', $category->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
