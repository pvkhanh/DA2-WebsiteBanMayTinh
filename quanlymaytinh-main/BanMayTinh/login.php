<?php
session_start();
include_once('ketnoi.php');  

$error = NULL;
$focus_field = NULL;  // Biến để lưu trữ trường cần focus khi có lỗi

$success_msg = isset($_SESSION['success_msg']) ? $_SESSION['success_msg'] : NULL;
// Xóa thông báo sau khi đã lấy
unset($_SESSION['success_msg']);

// Lấy giá trị từ form post hoặc giữ giá trị cũ
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";

if (isset($_POST['submit'])) {
    // Kiểm tra trường email
    if (!isset($_POST["username"]) || $_POST["username"] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "username";
    // Kiểm tra trường mật khẩu
    } elseif (!isset($_POST['mk']) || $_POST['mk'] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "mk";
    } else {
        // Kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$mk'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            // Lấy thông tin người dùng
            $row = mysqli_fetch_assoc($query);
            $_SESSION["username"] = $username;
            $_SESSION["mk"] = $mk;
            $_SESSION["name"] = $row['name']; 
            $_SESSION["quyen"] = $row['quyen'];  // Lưu vai trò vào session
            $_SESSION["iduser"] = $row['id_user'];

            // Kiểm tra vai trò và chuyển hướng tương ứng
            if ($row['quyen'] == 0) {
                header("Location: ../quantri/quantri.php");  // Trang quản trị cho admin
            } else {
                header("Location: ../BanMayTinh/index.php");  // Trang dành cho user
            }
            exit();
        } else {
            $error = "Tài khoản không tồn tại hoặc bạn không có quyền truy cập";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="Styles/login.css"> <!-- Thêm CSS của bạn -->
</head>

<body>

<header class="header">
    <div class="header-container">
        <a href="index.php" class="logo">
            <img src="Images/bkkh4.png" alt="BKKH Shop">
        </a>
    </div>
</header>

<div class="login-container">
    <h2>Đăng nhập</h2>
    <form action="login.php" method="POST">
        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if ($success_msg): ?>
        <div class="success-message" style="text-align: center; color: green; margin-bottom: 15px;">
            <?php echo htmlspecialchars($success_msg); ?>
        </div>
        <?php endif; ?>
        
        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if ($error): ?>
        <div class="error-message" style="text-align: center; color: red;">
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>
        
        <div class="form-group">
            <label for="username">Tên đăng nhập hoặc Email</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập hoặc email" 
                value="<?php echo htmlspecialchars($username); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'username') ? 'error-field' : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="mk" placeholder="Nhập mật khẩu" 
                value="<?php echo htmlspecialchars($mk); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'mk') ? 'error-field' : ''; ?>">
        </div>
        
        <button type="submit" name="submit">Đăng nhập</button>
    </form>
    
    <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
