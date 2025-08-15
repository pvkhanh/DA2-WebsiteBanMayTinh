<?php
session_start();
include_once('ketnoi.php');

$error = NULL;
$focus_field = NULL;

// Lấy giá trị từ form post hoặc giữ giá trị cũ
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";
$confirm_mk = isset($_POST["confirm_mk"]) ? $_POST["confirm_mk"] : "";
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$gioi_tinh = isset($_POST["gioi_tinh"]) ? $_POST["gioi_tinh"] : "";
$ngay_sinh = isset($_POST["ngay_sinh"]) ? $_POST["ngay_sinh"] : "";
$dia_chi = isset($_POST["dia_chi"]) ? $_POST["dia_chi"] : "";
$dien_thoai = isset($_POST["dien_thoai"]) ? $_POST["dien_thoai"] : "";

if (isset($_POST['submit'])) {
    // Kiểm tra username
    if (!isset($_POST["username"]) || $_POST["username"] == "") {
        $error = "Vui lòng điền tên đăng nhập";
        $focus_field = "username";
    }
    // Kiểm tra mật khẩu
    elseif (!isset($_POST['mk']) || $_POST['mk'] == "") {
        $error = "Vui lòng điền mật khẩu";
        $focus_field = "mk";
    }
    // Kiểm tra xác nhận mật khẩu
    elseif (!isset($_POST['confirm_mk']) || $_POST['confirm_mk'] == "") {
        $error = "Vui lòng xác nhận mật khẩu";
        $focus_field = "confirm_mk";
    }
    // Kiểm tra mật khẩu trùng khớp
    elseif ($_POST['mk'] !== $_POST['confirm_mk']) {
        $error = "Mật khẩu không khớp";
        $focus_field = "confirm_mk";
    }
    // Kiểm tra họ tên
    elseif (!isset($_POST['name']) || $_POST['name'] == "") {
        $error = "Vui lòng điền họ tên";
        $focus_field = "name";
    }
    // Kiểm tra email
    elseif (!isset($_POST['email']) || $_POST['email'] == "") {
        $error = "Vui lòng điền email";
        $focus_field = "email";
    }
    // Kiểm tra email hợp lệ
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ";
        $focus_field = "email";
    }
    // Kiểm tra số điện thoại
    elseif (!isset($_POST['dien_thoai']) || $_POST['dien_thoai'] == "") {
        $error = "Vui lòng điền số điện thoại";
        $focus_field = "dien_thoai";
    }
    else {
        // Kiểm tra username đã tồn tại chưa
        $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        if (mysqli_num_rows($check_username) > 0) {
            $error = "Tên đăng nhập đã tồn tại";
            $focus_field = "username";
        } else {
            // Kiểm tra email đã tồn tại chưa
            $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($check_email) > 0) {
                $error = "Email đã tồn tại";
                $focus_field = "email";
            } else {
                // Thêm người dùng mới vào database
                $sql = "INSERT INTO users (name, username, password, gioi_tinh, ngay_sinh, dia_chi, dien_thoai, email, quyen) 
                        VALUES ('$name', '$username', '$mk', '$gioi_tinh', '$ngay_sinh', '$dia_chi', '$dien_thoai', '$email', 1)";
                if (mysqli_query($conn, $sql)) {
                    // Lưu thông báo thành công vào session
                    $_SESSION['success_msg'] = "Đăng ký tài khoản thành công! Vui lòng đăng nhập.";
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Đăng ký thất bại. Vui lòng thử lại";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="Styles/login.css">
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
    <h2>Đăng ký</h2>
    <form action="register.php" method="POST">
        <?php if ($error): ?>
        <div class="error-message" style="text-align: center; color: red;">
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>
        
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" 
                value="<?php echo htmlspecialchars($username); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'username') ? 'error-field' : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="mk" placeholder="Nhập mật khẩu" 
                value="<?php echo htmlspecialchars($mk); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'mk') ? 'error-field' : ''; ?>">
        </div>

        <div class="form-group">
            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input type="password" id="confirm_password" name="confirm_mk" placeholder="Nhập lại mật khẩu" 
                value="<?php echo htmlspecialchars($confirm_mk); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'confirm_mk') ? 'error-field' : ''; ?>">
        </div>

        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" 
                value="<?php echo htmlspecialchars($name); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'name') ? 'error-field' : ''; ?>">
        </div>

        <div class="form-group">
            <label for="gioi_tinh">Giới tính</label>
            <select id="gioi_tinh" name="gioi_tinh" required>
                <option value="">Chọn giới tính</option>
                <option value="Nam" <?php echo ($gioi_tinh == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo ($gioi_tinh == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ngay_sinh">Ngày sinh</label>
            <input type="date" id="ngay_sinh" name="ngay_sinh" 
                value="<?php echo htmlspecialchars($ngay_sinh); ?>" required>
        </div>

        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input type="text" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ" 
                value="<?php echo htmlspecialchars($dia_chi); ?>" required>
        </div>

        <div class="form-group">
            <label for="dien_thoai">Số điện thoại</label>
            <input type="tel" id="dien_thoai" name="dien_thoai" placeholder="Nhập số điện thoại" 
                value="<?php echo htmlspecialchars($dien_thoai); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'dien_thoai') ? 'error-field' : ''; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email" 
                value="<?php echo htmlspecialchars($email); ?>" required 
                class="<?php echo (isset($focus_field) && $focus_field == 'email') ? 'error-field' : ''; ?>">
        </div>
        
        <button type="submit" name="submit">Đăng ký</button>
    </form>
    
    <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>