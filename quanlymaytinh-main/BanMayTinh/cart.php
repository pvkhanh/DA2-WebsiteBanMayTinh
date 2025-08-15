<?php
session_start();
include('../chucnang/ketnoi.php'); // Đảm bảo kết nối với cơ sở dữ liệu

// Kiểm tra nếu khách hàng đã đăng nhập
$idkh = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : null;

if (!$idkh) {
    echo "Bạn cần đăng nhập để sử dụng tính năng này!";
    exit();
}

// Kiểm tra nếu giỏ hàng đã được lưu trong session, nếu chưa thì lấy từ cơ sở dữ liệu
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Lấy giỏ hàng của người dùng từ cơ sở dữ liệu nếu giỏ hàng chưa có trong session
    $sql_cart = "SELECT * FROM giohang g
                 JOIN sanpham s ON g.id_sp = s.id_sp
                 WHERE g.id_user = '$idkh'";
    $result_cart = mysqli_query($conn, $sql_cart);

    // Nếu có sản phẩm trong giỏ hàng
    if (mysqli_num_rows($result_cart) > 0) {
        $_SESSION['cart'] = []; // Khởi tạo lại giỏ hàng trong session
        while ($item = mysqli_fetch_assoc($result_cart)) {
            $_SESSION['cart'][] = [
                'id_sp' => $item['id_sp'],
                'ten_sp' => $item['ten_sp'],
                'gia' => $item['don_gia'],
                'soluong' => $item['so_luong'],
                'hinh_anh' => $item['hinh_anh']
            ];
        }
    }
}

// Xử lý khi có yêu cầu cập nhật giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['soluong'] as $id_sp => $soluong) {
        // Kiểm tra nếu số lượng hợp lệ
        if ($soluong > 0) {
            // Cập nhật lại số lượng trong giỏ hàng và cơ sở dữ liệu
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id_sp'] == $id_sp) {
                    $item['soluong'] = $soluong;
                    break;
                }
            }
            $sql_update = "UPDATE giohang SET so_luong = $soluong WHERE id_user = '$idkh' AND id_sp = '$id_sp'";
            mysqli_query($conn, $sql_update);
        } else {
            // Nếu số lượng = 0, xóa sản phẩm khỏi giỏ hàng
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id_sp'] == $id_sp) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
            $sql_delete = "DELETE FROM giohang WHERE id_user = '$idkh' AND id_sp = '$id_sp'";
            mysqli_query($conn, $sql_delete);
        }
    }
    // Sau khi cập nhật, chuyển hướng lại trang giỏ hàng để cập nhật dữ liệu
    header("Location: cart.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="Styles/cart.css">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/banner.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/menuNgang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-box button {
            position: absolute;
            right: -67px;
            top: 1px;
            width: 32px;
            height: 32px;
            background: url('https://fptshop.com.vn/Content/v5/images/header/icon-search.png') center center no-repeat rgba(0, 0, 0, 0.3);
            background-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            padding: 0;
        }
    </style>
</head>

<body>
    <?php include 'header1.php'; ?>

    <h1>GIỎ HÀNG CỦA BẠN</h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Giỏ hàng trống.</p>
    <?php else: ?>
        <form method="POST">
            <table border="1">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $item):
                    $subtotal = $item['soluong'] * $item['gia'];
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['ten_sp']) ?></td>
                        <?php if (!empty($item['hinh_anh']) && file_exists('../quantri/images-laptop/' . $item['hinh_anh'])): ?>
                            <td><img src="../quantri/images-laptop/<?= htmlspecialchars($item['hinh_anh']) ?>"
                                    alt="<?= htmlspecialchars($item['ten_sp']) ?>" width="100"></td>
                        <?php else: ?>
                            <td>No image available</td>
                        <?php endif; ?>
                        <td><input type="number" name="soluong[<?= $item['id_sp'] ?>]" value="<?= $item['soluong'] ?>"
                                min="1" /></td>
                        <td><?= number_format($item['gia'], 0, ',', '.') ?> VND</td>
                        <td><?= number_format($subtotal, 0, ',', '.') ?> VND</td>
                        <td>
                            <a href="xoa_san_pham.php?id_sp=<?= $item['id_sp'] ?>"
                                onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này: <?= htmlspecialchars($item['ten_sp']) ?>?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p><strong>Tổng cộng:</strong> <?= number_format($total, 0, ',', '.') ?> VND</p>

            <button type="submit" name="update_cart">Cập nhật giỏ hàng</button>
        </form>
        <div class="container">
            <a href="phuongthucthanhtoan.php">Thanh toán</a>
        </div>
    <?php endif; ?>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>
