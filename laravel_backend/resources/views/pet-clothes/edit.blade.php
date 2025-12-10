@extends('layouts.admin')

@section('title', 'Sửa thời trang thú cưng')

@section('content')
    <div class="container">
        <h1>Sửa thời trang thú cưng</h1>
        <form action="{{ route('pet-clothes.update', $clothes->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $clothes->name }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Loại sản phẩm</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $clothes->type }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $clothes->price }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ $clothes->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($clothes->image)
                    <img src="{{ asset('storage/' . $clothes->image) }}" alt="{{ $clothes->name }}" width="100"
                        class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
