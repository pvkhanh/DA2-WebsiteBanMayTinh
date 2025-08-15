<?php
session_start();
include_once('ketnoi.php');
//nếu đúng thì chuyển tới admin
if (isset($_SESSION["username"]) && isset($_SESSION["mk"])) {
    $username = $_SESSION["username"];
    $mk = $_SESSION["mk"];

    // Query the database to check if the credentials are correct
    $sql = "SELECT * FROM users WHERE username = '$username'"; // Use a parameterized query for better security
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $id_user = $_GET['id_user'];

        $sql = "DELETE FROM users WHERE id_user = '$id_user'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Xoá thành viên thành công!');</script>";
            echo "<script>window.location.href = 'quantri.php?page_layout=danhsachuser';</script>";
        } else {
            echo "<script>alert('Lỗi khi xoá thành viên.');</script>";
        }
    } else {
        header('location:index.php');
    }
}
?>