# 🐾 Flutter Pet Shop – Frontend App

> Ứng dụng Flutter mô phỏng cửa hàng thú cưng – Dự án học phần _Lập trình ứng dụng di động_ (năm 3)

---

## 🎯 Giới thiệu

Đây là **phần Frontend Flutter** của dự án Pet Shop.  
Ứng dụng cho phép người dùng:

- Xem danh sách thú cưng & sản phẩm
- Xem chi tiết, thêm giỏ hàng, thanh toán
- Theo dõi đơn hàng theo thời gian thực
- Nhận nuôi thú cưng (Adoption Form)
- Xem & chỉnh sửa hồ sơ cá nhân
- Quản lý địa chỉ giao hàng & thanh toán
- Nhận thông báo, viết đánh giá sản phẩm

> 🔶 Lưu ý: Repo này **chỉ chứa mã nguồn Flutter**.  
> Toàn bộ API được tương tác thông qua file `api_service.dart`.  
> Backend Laravel sẽ có README riêng.

---

## 🚀 Công nghệ sử dụng

- **Flutter (Dart)**
- Material UI
- REST API integration qua `api_service.dart`
- Google Map API (tracking đơn hàng)
- State combine theo từng màn hình

---

## 📱 Danh sách các màn hình chính

### 👤 Người dùng

- `SignInPage.dart`, `SignUpPage.dart`
- `ProfilePage.dart`, `EditProfilePage.dart`
- `PhoneVerification.dart`
- `ForgotPasswordPage.dart`

### 🏠 Trang chủ & điều hướng

- `MainPage.dart`
- `IntroPage.dart`

### 🐶 Thú cưng

- `AllPetPage.dart`
- `PetDetailPage.dart`
- `AddNewPetPage.dart`
- `EditPetPage.dart`
- `MyPetPage.dart`

### 🛒 Mua sắm

- `ShopPage.dart`
- `ProductDetailPage.dart`
- `AddToCartPage.dart`
- `CheckOutPage.dart`
- `AddNewCardPage.dart`
- `MySavedCardsPage.dart`

### 📦 Đơn hàng

- `MyOrderPage.dart`
- `OrderDetailPage.dart`
- `OrderTrackingPage.dart`
- `TrackOrderPage.dart`
- `OrderTrackMap.dart`
- `LocationTrackMap.dart`

### 🐾 Nhận nuôi thú cưng

- `AdoptionFormPage.dart`
- `MyAdoptionPage.dart`

### 📨 Thông báo & đánh giá

- `NotificationList.dart`
- `WriteReviewPage.dart`

---

## 🗂 Cấu trúc thư mục (rút gọn)

```text
lib/
├─ main.dart
├─ api_service.dart
├─ MainPage.dart
│
├─ authentication/
│  ├─ SignInPage.dart
│  ├─ SignUpPage.dart
│  ├─ ForgotPasswordPage.dart
│  └─ PhoneVerification.dart
│
├─ pets/
│  ├─ AllPetPage.dart
│  ├─ PetDetailPage.dart
│  ├─ AddNewPetPage.dart
│  ├─ EditPetPage.dart
│  └─ MyPetPage.dart
│
├─ shop/
│  ├─ ShopPage.dart
│  ├─ ProductDetailPage.dart
│  ├─ AddToCartPage.dart
│  ├─ CheckOutPage.dart
│  └─ MySavedCardsPage.dart
│
├─ orders/
│  ├─ MyOrderPage.dart
│  ├─ OrderDetailPage.dart
│  ├─ OrderTrackingPage.dart
│  ├─ TrackOrderPage.dart
│  ├─ OrderTrackMap.dart
│  └─ LocationTrackMap.dart
│
├─ adoption/
│  ├─ AdoptionFormPage.dart
│  └─ MyAdoptionPage.dart
│
├─ profile/
│  ├─ ProfilePage.dart
│  ├─ EditProfilePage.dart
│  ├─ AddNewAddressPage.dart
│  └─ ShippingAddressPage.dart
│
└─ misc/
   ├─ NotificationList.dart
   └─ WriteReviewPage.dart
```

⚙️ Cách chạy dự án
1️⃣ Clone repo
git clone https://github.com/your-username/flutter_pet_shop.git
cd flutter_pet_shop

2️⃣ Cài dependency
flutter pub get

3️⃣ Chỉnh URL API

Trong file:

lib/api_service.dart

Cập nhật:

final String baseUrl = "http://your-backend-url/api";

4️⃣ Chạy ứng dụng
flutter run

📝 Ghi chú

Đây là Frontend thuần Flutter, không chứa API, database hay logic phía server.

Một số màn hình có thể dùng dữ liệu giả khi backend chưa sẵn sàng.

Code được chia theo từng module để dễ mở rộng & bảo trì.

👨‍💻 Nhóm thực hiện

Sinh viên năm 3 – Học phần Lập trình ứng dụng di động

Vai trò phân chia: UI/UX, API integration, logic trình bày, cấu trúc module Flutter.
