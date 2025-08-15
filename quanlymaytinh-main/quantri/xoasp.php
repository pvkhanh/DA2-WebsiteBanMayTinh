<?php
session_start();
include_once('ketnoi.php');
if (isset($_SESSION["username"]) && isset($_SESSION["mk"])) {
    $username = $_SESSION["username"];
    $mk = $_SESSION["mk"];
    $sql = "SELECT * FROM users WHERE username = '$username'"; 
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        if (isset($_GET['id_sp'])) {
            $id_sp = $_GET['id_sp'];
            $sql = "DELETE FROM sanpham WHERE id_sp = '$id_sp'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Xoá sản phẩm thành công!');</script>";
                echo "<script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
            } else {
                echo "<script>alert('Lỗi khi xoá sản phẩm.');</script>";
            }
        } else {
            echo "<script>alert('Không có ID sản phẩm để xóa.');</script>";
            echo "<script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
        }
    } else {
        header('location:index.php');
    }
}
?>