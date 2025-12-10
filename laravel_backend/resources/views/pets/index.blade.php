@extends('layouts.admin')

@section('title', 'Danh sách thú cưng')

@section('content')
    <div class="container">
        <h1>Danh sách thú cưng</h1>
        <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Thêm thú cưng</a>
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
                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->id }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->type }}</td>
                        <td>{{ number_format($pet->price, 0, ',', '.') }} triệu VND</td>
                        <td>
                            @if ($pet->image)
                                <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}" width="100">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
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
