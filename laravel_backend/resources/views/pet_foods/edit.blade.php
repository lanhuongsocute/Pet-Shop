@extends('layouts.admin')

@section('title', 'Sửa thức ăn thú cưng')

@section('content')
    <div class="container">
        <h1>Sửa thức ăn thú cưng</h1>
        <form action="{{ route('pet-foods.update', $petFood->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên thức ăn</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $petFood->name }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $petFood->price }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ $petFood->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="" disabled>Chọn danh mục</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $petFood->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($petFood->image)
                    <img src="{{ asset('storage/' . $petFood->image) }}" alt="{{ $petFood->name }}" width="100"
                        class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
