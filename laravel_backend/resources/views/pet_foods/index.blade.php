@extends('layouts.admin')

@section('title', 'Danh sách thức ăn thú cưng')

@section('content')
    <div class="container">
        <h1>Danh sách thức ăn thú cưng</h1>
        <a href="{{ route('pet-foods.create') }}" class="btn btn-primary mb-3">Thêm thức ăn</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="bg-success text-white">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petFoods as $petFood)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $petFood->name }}</td>
                        <td>{{ number_format($petFood->price, 0, ',', '.') }} VND</td>
                        <td>{{ $petFood->description }}</td>
                        <td>{{ $petFood->category->name ?? 'Không có danh mục' }}</td>
                        <td>
                            @if ($petFood->image)
                                <img src="{{ asset('storage/' . $petFood->image) }}" alt="{{ $petFood->name }}" width="50">
                            @else
                                Không có hình ảnh
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pet-foods.edit', $petFood->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('pet-foods.destroy', $petFood->id) }}" method="POST"
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
