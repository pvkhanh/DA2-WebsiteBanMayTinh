<?php
session_start();
include_once('ketnoi.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Kiểm tra giỏ hàng
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>
            alert('Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm.');
            window.location.href = 'index.php';
          </script>";
    exit();
}

// Kiểm tra nếu khách hàng đã đăng nhập
$username = $_SESSION['username'] ?? null;
if (!$username) {
    echo "<script>
            alert('Vui lòng đăng nhập trước khi thanh toán.');
            window.location.href = 'login.php';
          </script>";
    exit();
}

// Lấy thông tin người dùng
$sql_user = "SELECT * FROM users WHERE username = '$username'";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

if (!$user) {
    echo "<script>
            alert('Không tìm thấy thông tin khách hàng!');
            window.location.href = 'index.php';
          </script>";
    exit();
}

// Thông tin đơn hàng
$id_user = $user['id_user'];
$ten_khach_hang = $user['name'];
$ngay_tao = date('Y-m-d H:i:s');
$tong_tien = 0;

foreach ($_SESSION['cart'] as $item) {
    $tong_tien += $item['soluong'] * $item['gia'];
}

// Thêm đơn hàng vào cơ sở dữ liệu
$sql_donhang = "INSERT INTO donhang (id_user, ngay_tao, tong_tien, trang_thai) 
                VALUES ('$id_user', '$ngay_tao', '$tong_tien', 'Chờ xử lý')";
if (mysqli_query($conn, $sql_donhang)) {
    $donhang_id = mysqli_insert_id($conn);
    foreach ($_SESSION['cart'] as $item) {
        $id_sp = $item['id_sp'];
        $so_luong_ban = $item['soluong'];
        $don_gia = $item['gia'];

        $sql_chitiet = "INSERT INTO chitietdonhang (id_sp, id_donhang, so_luong_ban, don_gia) 
                        VALUES ('$id_sp', '$donhang_id', '$so_luong_ban', '$don_gia')";
        if (!mysqli_query($conn, $sql_chitiet)) {
            die("Lỗi chèn chi tiết đơn hàng: " . mysqli_error($conn));
        }
    }
    $sql_get_products = "SELECT sp.ten_sp, ctdh.don_gia, ctdh.so_luong_ban 
                         FROM chitietdonhang ctdh 
                         JOIN sanpham sp ON ctdh.id_sp = sp.id_sp 
                         WHERE ctdh.id_donhang = '$donhang_id'";
    $result_products = mysqli_query($conn, $sql_get_products);
    if (!$result_products) {
        die("Lỗi truy vấn sản phẩm: " . mysqli_error($conn));
    }
    unset($_SESSION['cart']);
    ?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hóa Đơn Thanh Toán</title>
        <link rel="stylesheet" href="path/to/your/css/file.css">
        <style>
            /* Thiết lập font và màu sắc mặc định */
            body {
                display: flex;
                justify-content: center;
                /* Căn giữa theo chiều ngang */
                align-items: center;
                /* Căn giữa theo chiều dọc */
                min-height: 100vh;
                /* Đảm bảo chiều cao của trang đủ để căn giữa */
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                /* Tạo màu nền nhẹ */
            }

            .container {
                width: 60%;
                /* Điều chỉnh chiều rộng của form */
                background-color: #fff;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                /* Căn giữa nội dung văn bản */
            }

            /* Tiêu đề Hóa Đơn */
            h2 {
                text-align: center;
                font-size: 24px;
                color: #333;
                margin-bottom: 20px;
            }

            /* Căn chỉnh và tạo không gian cho thông tin hóa đơn */
            p {
                font-size: 16px;
                line-height: 1.6;
                margin: 5px 0;
            }

            /* Bảng chi tiết đơn hàng */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            table th,
            table td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }

            table th {
                background-color: #f4f4f4;
                color: #333;
            }

            table td {
                font-size: 16px;
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            table td strong {
                font-weight: bold;
            }

            /* Định dạng cho tổng tiền */
            table tfoot td {
                font-size: 18px;
                font-weight: bold;
                background-color: #f4f4f4;
                color: #333;
            }

            /* Liên kết quay lại trang chủ */
            a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: #fff;
                text-decoration: none;
                border-radius: 4px;
                text-align: center;
            }

            a:hover {
                background-color: #45a049;
            }

            /* Giới hạn chiều rộng cho bảng và căn giữa */
            .container {
                max-width: 800px;
                margin: 0 auto;
            }

            /* Thêm khoảng cách giữa các phần tử */
            footer {
                text-align: center;
                margin-top: 40px;
                font-size: 14px;
                color: #777;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Hóa Đơn Thanh Toán</h2>
            <p><strong>Mã đơn hàng:</strong> <?= $donhang_id ?></p>
            <p><strong>Họ tên khách hàng:</strong> <?= htmlspecialchars($ten_khach_hang) ?></p>
            <p><strong>Ngày tạo:</strong> <?= $ngay_tao ?></p>

            <table>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tong_tien_hien_thi = 0;
                    while ($row = mysqli_fetch_assoc($result_products)) {
                        $thanhtien = $row['so_luong_ban'] * $row['don_gia'];
                        $tong_tien_hien_thi += $thanhtien;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['ten_sp']) ?></td>
                            <td><?= $row['so_luong_ban'] ?></td>
                            <td><?= number_format($row['don_gia'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Tổng tiền</strong></td>
                        <td><strong><?= number_format($tong_tien_hien_thi, 0, ',', '.') ?> VNĐ</strong></td>
                    </tr>
                </tfoot>
            </table>

            <p>Cảm ơn quý khách đã mua hàng!</p>

            <a href="index.php">Quay lại trang chủ</a>
        </div>
    </body>

    </html>
    <?php
} else {
    echo "<script>
            alert('Có lỗi xảy ra khi xử lý đơn hàng. Vui lòng thử lại.');
            window.history.back();
          </script>";
}
?>