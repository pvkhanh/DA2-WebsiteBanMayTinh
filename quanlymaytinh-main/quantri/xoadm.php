<?php
session_start();
include_once('ketnoi.php');
//nếu đúng thì chuyển tới admin
if (isset($_SESSION["username"]) && isset($_SESSION["mk"])) {
    $username = $_SESSION["username"];
    $mk = $_SESSION["mk"];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $id_dm = $_GET['id_dm'];
        $sql = "DELETE FROM danhmuc WHERE id_dm = '$id_dm'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Xoá danh mục thành công!');</script>";
            echo "<script>window.location.href = 'quantri.php?page_layout=danhsachdm';</script>";
        } else {
            echo "<script>alert('Lỗi khi xoá danh mục.');</script>";
        }
    } else {
        header('location:index.php');
    }
}
?>