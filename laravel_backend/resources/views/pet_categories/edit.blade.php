@extends('layouts.admin')

@section('title', 'Sửa Danh mục Thú cưng')

@section('content')
    <div class="container">
        <h1>Sửa Danh mục Thú cưng</h1>
        <form action="{{ route('pet_categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="mt-2"
                        style="width: 100px; height: 100px; object-fit: cover;">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
