@extends('layouts.admin')

@section('title', 'Thêm thú cưng')

@section('content')
    <div class="container">
        <h1>Thêm thú cưng</h1>
        <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên thú cưng</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Loại thú cưng</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="" disabled selected>Chọn danh mục</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Thêm thú cưng</button>
        </form>
    </div>
@endsection
