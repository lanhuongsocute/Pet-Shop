@extends('layouts.admin')

@section('title', 'Thêm danh mục thức ăn thú cưng')

@section('content')
    <div class="container">
        <h1>Thêm danh mục thức ăn thú cưng</h1>
        <form action="{{ route('pet-food-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
        </form>
    </div>
@endsection
