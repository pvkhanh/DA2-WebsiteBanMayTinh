<?php
require 'ketnoi.php';

// Kiểm tra xem tham số 'id' có được truyền qua URL hay không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Câu lệnh SQL chuẩn bị để xóa bài viết
    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);  // Gán giá trị cho tham số 'id' với kiểu "integer"

    // Thực thi câu lệnh SQL
    if ($stmt->execute()) {
        echo "<script>alert('Xoá danh mục thành công!');</script>";
        echo "<script>window.location.href = 'quantri.php?page_layout=danhsachtintuc';</script>";
    } else {
        echo "<script>alert('Lỗi!');</script>";
    }
} else {
    echo "<script>alert('ID không hợp lệ!!');</script>";
}
?>