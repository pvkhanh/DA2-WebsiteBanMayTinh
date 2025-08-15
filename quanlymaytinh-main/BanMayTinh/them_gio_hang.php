<?php
include('../chucnang/ketnoi.php');
session_start();

// Kiểm tra nếu khách hàng đã đăng nhập
$idkh = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : null;

// Nếu khách hàng chưa đăng nhập, trả về thông báo
if (!$idkh) {
    echo "Bạn cần đăng nhập để sử dụng tính năng này!";
    exit();
}

// Kiểm tra phương thức yêu cầu có phải POST không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận các dữ liệu từ AJAX và bảo vệ chống SQL injection
    $id_sp = (int)$_POST['id_sp'];
    $ten_sp = mysqli_real_escape_string($conn, $_POST['ten_sp']);
    $gia = (int)$_POST['gia'];
    $soluong = (int)$_POST['soluong'];
    $hinh_anh = mysqli_real_escape_string($conn, $_POST['hinh_anh']);

    // Kiểm tra dữ liệu
    if (!$id_sp || !$ten_sp || !$gia || !$soluong || !$hinh_anh) {
        echo "Dữ liệu không hợp lệ.";
        exit();
    }

    // Kiểm tra xem giỏ hàng có tồn tại chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id_sp'] == $id_sp) {
            $item['soluong'] += $soluong;
            $found = true;
            break;
        }
    }

    // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
    if (!$found) {
        $_SESSION['cart'][] = [
            'id_sp' => $id_sp,
            'ten_sp' => $ten_sp,
            'gia' => $gia,
            'soluong' => $soluong,
            'hinh_anh' => $hinh_anh // Thêm hình ảnh vào giỏ hàng
        ];
    }

    // Thêm vào cơ sở dữ liệu
    $sql_check = "SELECT * FROM giohang WHERE id_user = '$idkh' AND id_sp = '$id_sp'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Nếu sản phẩm đã có, cập nhật số lượng
        $sql_update = "UPDATE giohang SET so_luong = so_luong + $soluong WHERE id_user = '$idkh' AND id_sp = '$id_sp'";
        if (mysqli_query($conn, $sql_update)) {
            echo "Cập nhật số lượng sản phẩm trong giỏ hàng thành công!";
        } else {
            echo "Có lỗi xảy ra khi cập nhật giỏ hàng.";
        }
    } else {
        // Nếu sản phẩm chưa có, thêm mới vào giỏ hàng
        $sql_insert = "INSERT INTO giohang (id_user, id_sp, so_luong, don_gia, ngay_them) 
                       VALUES ('$idkh', '$id_sp', '$soluong', '$gia', NOW())";
        if (mysqli_query($conn, $sql_insert)) {
            echo "Thêm sản phẩm vào giỏ hàng thành công!";
        } else {
            echo "Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.";
        }
    }

    // Điều hướng về trang giỏ hàng
    header("Location: cart.php");
    exit;
} else {
    echo "Phương thức không hợp lệ.";
}
?>
