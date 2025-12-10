@extends('layouts.admin')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="container">
        <h1>Danh sách đơn hàng</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Thêm đơn hàng</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Hình ảnh</th> <!-- Cột mới để hiển thị ảnh -->
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>
                            @if ($order->image)
                                <!-- Kiểm tra nếu có ảnh -->
                                <img src="{{ asset('storage/' . $order->image) }}" alt="Order Image"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
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
