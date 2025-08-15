<?php
require 'ketnoi.php';

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Sử dụng câu lệnh SQL chuẩn bị để tránh SQL Injection
    $stmt = $conn->prepare("UPDATE news SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $id); // 'ssi' tương ứng với kiểu dữ liệu: string, string, integer

    // Thực thi câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='quantri.php?page_layout=danhsachtintuc';</script>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo "Yêu cầu không hợp lệ!";
}
?>
