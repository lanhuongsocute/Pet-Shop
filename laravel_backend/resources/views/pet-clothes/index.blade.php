@extends('layouts.admin')

@section('title', 'Danh sách thời trang thú cưng')

@section('content')
    <div class="container">
        <h1>Danh sách thời trang thú cưng</h1>
        <a href="{{ route('pet-clothes.create') }}" class="btn btn-primary mb-3">Thêm thời trang</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petClothes as $clothes)
                    <tr>
                        <td>{{ $clothes->id }}</td>
                        <td>{{ $clothes->name }}</td>
                        <td>{{ $clothes->type }}</td>
                        <td>{{ number_format($clothes->price, 0, ',', '.') }} VND</td>
                        <td>
                            @if ($clothes->image)
                                <img src="{{ asset('storage/' . $clothes->image) }}" alt="{{ $clothes->name }}" width="100">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pet-clothes.edit', $clothes->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('pet-clothes.destroy', $clothes->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
