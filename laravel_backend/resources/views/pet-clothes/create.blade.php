@extends('layouts.admin')

@section('title', 'Thêm thời trang thú cưng')

@section('content')
    <div class="container">
        <h1>Thêm thời trang thú cưng</h1>
        <form action="{{ route('pet-clothes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Loại sản phẩm</label>
                <input type="text" name="type" id="type" class="form-control" required>
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
            <button type="submit" class="btn btn-primary">Thêm thời trang</button>
        </form>
    </div>
@endsection
