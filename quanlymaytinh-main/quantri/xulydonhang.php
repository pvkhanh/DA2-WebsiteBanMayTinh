<?php
include '../BanMayTinh/ketnoi.php';
if (isset($_POST['id_donhang']) && isset($_POST['trang_thai'])) {
    $id_donhang = $_POST['id_donhang'];
    $trang_thai = $_POST['trang_thai'];
    $stmt = $conn->prepare("UPDATE donhang SET trang_thai = ? WHERE id_donhang = ?");
    $stmt->bind_param("si", $trang_thai, $id_donhang);

    if ($stmt->execute()) {
        echo "Cập nhật trạng thái đơn hàng thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Dữ liệu không hợp lệ!";
}
$conn->close();
header("Location: quantri.php?page_layout=danhsachdonhang");
exit;
?>
