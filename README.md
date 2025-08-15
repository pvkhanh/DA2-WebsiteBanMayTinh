# 💻 Hệ Thống Quản Lý Bán Máy Tính

## 📌 Giới thiệu

Dự án **Quản Lý Bán Máy Tính** là website thương mại điện tử hỗ trợ:
- Mua bán laptop, linh kiện, phụ kiện.
- Quản lý giỏ hàng và thanh toán trực tuyến.
- Quản lý sản phẩm, danh mục, người dùng, đơn hàng qua trang Admin.

Hệ thống gồm:
- **Frontend (Khách hàng)**: Xem sản phẩm, tìm kiếm, đặt hàng.
- **Backend (Quản trị)**: Quản lý toàn bộ nội dung và dữ liệu.

---

## 🛠 Công nghệ sử dụng

- **Ngôn ngữ**: PHP, HTML5, CSS3, JavaScript, jQuery
- **Cơ sở dữ liệu**: MySQL
- **Thư viện & Framework**:
  - Bootstrap (Responsive UI)
  - Font Awesome (Icon)
  - Chart.js (Thống kê)
  - jQuery DataTables (Quản lý bảng dữ liệu)
- **Công cụ phát triển**:
  - XAMPP (Apache + MySQL)
  - phpMyAdmin (Quản lý DB)
  - Visual Studio Code

---

## 📂 Cấu trúc thư mục

- `/BanMayTinh` → Giao diện khách hàng.
- `/chucnang` → Xử lý các chức năng nghiệp vụ.
- `/quantri` → Giao diện quản trị.
- `style.css` → File CSS tổng hợp.
- `sql_query.sql` & `quanlybanlaptop.sql` → File cơ sở dữ liệu mẫu.

---

## 🚀 Chức năng

### **Khách hàng**
- Xem danh mục: Laptop, Chuột, Bàn phím, RAM, Ổ cứng, Sạc, Pin...
- Xem chi tiết sản phẩm.
- Tìm kiếm sản phẩm.
- Quản lý giỏ hàng (thêm, xóa).
- Thanh toán trực tuyến.
- Xem tin tức.

### **Admin**
- Đăng nhập / đăng xuất.
- Quản lý danh mục, sản phẩm, người dùng.
- Quản lý đơn hàng (duyệt, hủy).
- Xem thống kê doanh thu.

---

## 📦 Cài đặt

1. Cài **XAMPP** và khởi động Apache + MySQL.
2. Copy dự án vào:
3. Import DB:
- Mở phpMyAdmin: http://localhost/phpmyadmin
- Tạo DB mới: `quanlybanmaytinh`
- Import file `sql_query.sql` hoặc `quanlybanlaptop.sql`
4. Cấu hình file `ketnoi.php` (trong `/BanMayTinh`, `/chucnang`, `/quantri`).
5. Chạy:
- Khách hàng: [http://localhost/Nhom1-QuanLyBanMayTinh/quanlymaytinh-main/BanMayTinh](http://localhost/Nhom1-QuanLyBanMayTinh/quanlymaytinh-main/BanMayTinh)
- Admin: [http://localhost/Nhom1-QuanLyBanMayTinh/quanlymaytinh-main/quantri](http://localhost/Nhom1-QuanLyBanMayTinh/quanlymaytinh-main/quantri)

---

## 🖼 Demo giao diện

### **Giao diện trang chủ**
<img width="1872" height="843" alt="image" src="https://github.com/user-attachments/assets/5810eae1-9f5b-4d0b-9da7-17a486f2def7" />


### **Chi tiết sản phẩm**
<img width="777" height="665" alt="image" src="https://github.com/user-attachments/assets/e87032d5-d0cd-4302-93ba-2753a10b2b9e" />


### **Giỏ hàng**
<img width="1890" height="786" alt="image" src="https://github.com/user-attachments/assets/54508938-dbb8-4e34-b5cd-4443d7a370c2" />


### **Thanh toán**
<img width="726" height="659" alt="image" src="https://github.com/user-attachments/assets/6d99dff9-1127-4af8-8d77-943f113eba2f" />


### **Hoá đơn thanh toán**

<img width="946" height="508" alt="image" src="https://github.com/user-attachments/assets/9e443c51-e3ca-4d73-836a-93f84aec1e3f" />


### **Trang quản trị**
<img width="1874" height="840" alt="image" src="https://github.com/user-attachments/assets/6f7e6b51-708d-4c03-8186-b06771e642c5" />

- Danh mục sản phẩm
<img width="1917" height="827" alt="image" src="https://github.com/user-attachments/assets/cf8f8976-72b8-4586-ad51-ef46415fcaa5" />


## 👨‍💻 Nhóm phát triển
- Nhóm 1 - Môn **Quản Lý Bán Máy Tính**
- Ngôn ngữ: **PHP + MySQL**
- Giao diện responsive với **Bootstrap**

---

## 📜 Giấy phép
Dự án dùng cho mục đích học tập, không sử dụng thương mại nếu chưa được sự cho phép của nhóm.
