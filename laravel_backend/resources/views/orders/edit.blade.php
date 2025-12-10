@extends('layouts.admin')

@section('title', 'Sửa đơn hàng')

@section('content')
    <div class="container">
        <h1>Sửa đơn hàng</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="customer_name" class="form-label">Tên khách hàng</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control"
                    value="{{ $order->customer_name }}" required>
            </div>
            <div class="mb-3">
                <label for="customer_email" class="form-label">Email khách hàng</label>
                <input type="email" name="customer_email" id="customer_email" class="form-control"
                    value="{{ $order->customer_email }}" required>
            </div>
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Số điện thoại</label>
                <input type="text" name="customer_phone" id="customer_phone" class="form-control"
                    value="{{ $order->customer_phone }}" required>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Tổng tiền</label>
                <input type="number" name="total_price" id="total_price" class="form-control"
                    value="{{ $order->total_price }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Hủy bỏ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
        </form>
    </div>
@endsection
