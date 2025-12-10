# 🐶🐱 PetShop Backend – Laravel API & Admin Dashboard

Backend PetShop được xây dựng bằng **Laravel**, cung cấp API cho ứng dụng Flutter và giao diện quản trị dành cho Admin.

Hệ thống hỗ trợ quản lý thú cưng, danh mục, thời trang – thức ăn – phụ kiện thú cưng, đơn hàng, người dùng và phân quyền.

---

## 🚀 Công nghệ sử dụng

-   **Laravel 8+ / 9+**
-   **MySQL**
-   **Blade Template** (Admin UI)
-   **Eloquent ORM**
-   **Middleware Auth + Phân quyền Admin**
-   **RESTful API chuẩn**

---

## 📌 Chức năng Backend

### 🔐 **1. Xác thực – Authentication**

-   Đăng nhập admin (`/login`)
-   Đăng xuất (`/logout`)
-   Middleware kiểm tra quyền admin  
    → Chỉ admin mới truy cập được dashboard và các trang quản lý.

---

### 🧑‍💼 **2. Admin Dashboard**

-   Trang thống kê tổng quan
-   Xem số lượng người dùng, thú cưng, đơn hàng, doanh thu...

---

### 👤 **3. Quản lý người dùng**

Route: `Route::resource('users', UserController::class);`

Chức năng gồm:

-   Xem danh sách user
-   Thêm user
-   Sửa user
-   Xóa user

---

### 🐾 **4. Quản lý thú cưng**

Route: `Route::resource('pets', PetController::class);`

Bao gồm:

-   CRUD thú cưng
-   Ảnh, giá, mô tả
-   Liên kết danh mục thú cưng

---

### 📂 **5. Quản lý danh mục thú cưng**

Route:  
`Route::resource('pet_categories', PetCategoryController::class);`

Dùng để phân loại thú:

-   Chó
-   Mèo
-   Hamster
-   Và các loại thú khác

---

### 🍖 **6. Thức ăn thú cưng – Pet Food**

Route:  
`Route::resource('pet-foods', PetFoodController::class);`  
`Route::resource('pet-food-categories', PetFoodCategoryController::class);`

Chức năng:

-   CRUD thức ăn
-   CRUD danh mục thức ăn
-   Ảnh – giá – số lượng – mô tả

---

### 👗 **7. Thời trang thú cưng – Pet Clothes**

Route:  
`Route::resource('pet-clothes', PetClothesController::class);`

Quản lý:

-   Quần áo thú cưng
-   Kích cỡ – màu sắc – giá bán
-   Kho hàng

---

### 📦 **8. Quản lý đơn hàng – Orders**

Route:  
`Route::resource('orders', OrderController::class);`

Bao gồm:

-   Danh sách đơn hàng
-   Chi tiết đơn
-   Trạng thái (Chờ xử lý → Đang giao → Hoàn thành)
-   Thông tin người mua & sản phẩm

---

## 🛣️ Danh sách Route chính (tóm tắt)

```php
// Authentication
/login          # GET - form đăng nhập
/login          # POST - xử lý đăng nhập
/logout         # POST - đăng xuất

// Admin Dashboard
/admin                  # Trang dashboard
/admin/profile          # Hồ sơ admin

// Users
/users                  # CRUD người dùng

// Pets
/pets                   # Quản lý thú cưng
/pet_categories         # Danh mục thú cưng

// Pet Foods
/pet-foods              # Thức ăn thú cưng
/pet-food-categories    # Danh mục thức ăn

// Pet Clothes
/pet-clothes            # Quần áo thú cưng

// Orders
/orders                 # Quản lý đơn hàng
```

⚙️ Hướng dẫn cài đặt & chạy Backend
1️⃣ Clone dự án
git clone https://github.com/your-username/petshop-backend.git
cd petshop-backend

2️⃣ Cài đặt thư viện
composer install

3️⃣ Tạo file .env
cp .env.example .env

Cấu hình:

DB_DATABASE=petshop
DB_USERNAME=root
DB_PASSWORD=yourpassword

4️⃣ Generate key
php artisan key:generate

5️⃣ Chạy migration + seed (nếu có)
php artisan migrate --seed

6️⃣ Chạy server
php artisan serve

API mặc định:
👉 http://127.0.0.1:8000/api

Admin panel:
👉 http://127.0.0.1:8000/login

🔐 Middleware CheckAdmin

Backend có middleware:

CheckAdmin::class

Mục đích:

Chỉ user có role admin mới được vào /admin/\*

User thường bị từ chối truy cập

📌 Lưu ý

Đây là Backend: chứa API + giao diện admin.

Flutter Frontend sẽ gọi API qua URL dạng:

http://your-domain.com/api

Dự án có thể mở rộng thêm:

API giỏ hàng

Thanh toán

Review đánh giá

Push notification

👨‍💻 Nhóm thực hiện

Sinh viên năm 3 – Học phần Lập trình ứng dụng di động

Phân chia vai trò:

Backend Laravel

Database & Migration

Controller – API – Middleware

Admin UI (Blade)

Kết nối Frontend Flutter
