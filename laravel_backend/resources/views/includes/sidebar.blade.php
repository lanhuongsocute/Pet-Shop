<div class="sidebar">
    <h4>Quản lý</h4>
    <ul class="nav flex-column p-2">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">Người dùng</a>
        </li>

        <!-- Menu Thú cưng -->
        <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#petsMenu"
                aria-expanded="false">
                Thú cưng
            </a>
            <div class="collapse" id="petsMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('pet_categories.index') }}" class="nav-link">Danh mục Thú cưng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pets.index') }}" class="nav-link">Danh sách Thú cưng</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Menu Thức ăn thú cưng -->
        <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#petFoodMenu"
                aria-expanded="false">
                Thức ăn thú cưng
            </a>
            <div class="collapse" id="petFoodMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('pet-food-categories.index') }}" class="nav-link">Danh mục Thức ăn</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pet-foods.index') }}" class="nav-link">Danh sách Thức ăn</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Menu Thời trang thú cưng -->
        <li class="nav-item">
            <a href="{{ route('pet-clothes.index') }}" class="nav-link">Thời trang thú cưng</a>
        </li>

        <!-- Menu Đơn hàng -->
        <li class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link">Đơn hàng</a>
        </li>

        <!-- Menu Hồ sơ cá nhân -->
        <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link">Hồ sơ của tôi</a>
        </li>
    </ul>
</div>
