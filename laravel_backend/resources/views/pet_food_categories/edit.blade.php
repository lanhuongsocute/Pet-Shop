@extends('layouts.admin')

@section('title', 'Sửa danh mục thức ăn thú cưng')

@section('content')
    <div class="container">
        <h1>Sửa danh mục thức ăn thú cưng</h1>
        <form action="{{ route('pet-food-categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="100"
                        class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </form>
    </div>
@endsection
