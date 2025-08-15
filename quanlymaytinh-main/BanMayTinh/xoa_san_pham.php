<?php
session_start();
include('../chucnang/ketnoi.php'); // Đảm bảo kết nối với cơ sở dữ liệu

if (isset($_GET['id_sp'])) {
    $id_sp = (int)$_GET['id_sp'];
    $idkh = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : null;

    if (!$idkh) {
        echo "Bạn cần đăng nhập để sử dụng tính năng này!";
        exit();
    }

    // Xóa sản phẩm khỏi giỏ hàng trong session
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_sp'] == $id_sp) {
            unset($_SESSION['cart'][$key]); // Xóa sản phẩm trong session
            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']); // Cập nhật chỉ mục lại

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    $sql_delete = "DELETE FROM giohang WHERE id_user = '$idkh' AND id_sp = '$id_sp'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "Sản phẩm đã được xóa khỏi giỏ hàng!";
    } else {
        echo "Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.";
    }
}

header("Location: cart.php");
exit;
?>
