<style>
    .suadm {
        width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        color: #333;
    }

    textarea {
        resize: vertical;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #5b9bd5;
        outline: none;
    }

    button[type="submit"],
    button[type="reset"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-right: 10px;
    }

    button[type="submit"]:hover,
    button[type="reset"]:hover {
        background-color: #45a049;
    }


    button[type="reset"] {
        background-color: #f44336;
    }

    button[type="reset"]:hover {
        background-color: #e53935;
    }

    .alert {
        padding: 15px;
        background-color: #f44336;
        color: white;
        margin-bottom: 20px;
        border-radius: 4px;
        font-size: 16px;
    }

    .alert.success {
        background-color: #4CAF50;
    }

    .alert.info {
        background-color: #2196F3;
    }

    .alert.warning {
        background-color: #ff9800;
    }


    .alert.success {
        background-color: #4CAF50;
    }


    .alert.error {
        background-color: #f44336;
    }


    textarea {
        min-height: 100px;
    }

    input[type="text"],
    textarea {
        box-sizing: border-box;
    }

    @media screen and (max-width: 768px) {
        form {
            width: 90%;
        }

        h1 {
            font-size: 20px;
        }
    }
</style>
<?php
include_once('ketnoi.php');

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $sql = "SELECT * FROM users WHERE id_user = '$id_user'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];
        $gioi_tinh = $row['gioi_tinh'];
        $ngay_sinh = $row['ngay_sinh'];
        $dia_chi = $row['dia_chi'];
        $dien_thoai = $row['dien_thoai'];
        $email = $row['email'];
        $quyen = $row['quyen'];
    } else {
        echo "<script>alert('Thành viên không tồn tại'); window.location.href='quantri.php?page_layout=danhsachuser';</script>";
        exit();
    }
} else {
    echo "<script>alert('Không tìm thấy thành viên để sửa'); window.location.href='quantri.php?page_layout=danhsachuser';</script>";
    exit();
}

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gioi_tinh = mysqli_real_escape_string($conn, $_POST['gioi_tinh']);
    $ngay_sinh = mysqli_real_escape_string($conn, $_POST['ngay_sinh']);
    $dia_chi = mysqli_real_escape_string($conn, $_POST['dia_chi']);
    $dien_thoai = mysqli_real_escape_string($conn, $_POST['dien_thoai']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $quyen = intval($_POST['quyen']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email không hợp lệ!');</script>";
        exit();
    }

    if (!is_numeric($dien_thoai)) {
        echo "<script>alert('Số điện thoại phải là số!');</script>";
        exit();
    }

    if (!is_numeric($quyen) || $quyen < 0) {
        echo "<script>alert('Quyền phải là số nguyên không âm!');</script>";
        exit();
    }

    $sql = "UPDATE users SET 
            name = '$name', 
            username = '$username', 
            password = '$password', 
            gioi_tinh = '$gioi_tinh', 
            ngay_sinh = '$ngay_sinh', 
            dia_chi = '$dia_chi', 
            dien_thoai = '$dien_thoai', 
            email = '$email', 
            quyen = '$quyen' 
            WHERE id_user = '$id_user'";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                alert('Cập nhật thành viên thành công!');
                window.location.href = 'quantri.php?page_layout=danhsachuser';
              </script>";
        exit();
    } else {
        echo "<script>alert('Cập nhật không thành công! Lỗi: " . mysqli_error($conn) . "');</script>";
    }
}
?>


<link rel="stylesheet" type="text/css" href="css/suadm.css" />
<h1>Sửa Thành Viên</h1>
<div class="suadm">
    <form method="POST" action="suauser.php?id_user=<?php echo $id_user; ?>">
        <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ tên"
                value="<?php echo $name; ?>" required />
        </div>
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tên đăng nhập"
                value="<?php echo $username; ?>" required />
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="text" id="pasword" name="password" class="form-control" placeholder="Nhập mật khẩu"
                value="<?php echo $password; ?>" required />
        </div>
        <div class="form-group">
            <label for="gioi_tinh">Giới tính</label>
            <select id="gioi_tinh" name="gioi_tinh" class="form-control" required>
                <option value="Nam" <?php if ($gioi_tinh === 'Nam')
                    echo 'selected'; ?>>Nam</option>
                <option value="Nữ" <?php if ($gioi_tinh === 'Nữ')
                    echo 'selected'; ?>>Nữ</option>
                <option value="Khác" <?php if ($gioi_tinh === 'Khác')
                    echo 'selected'; ?>>Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ngay_sinh">Ngày sinh</label>
            <input type="date" id="ngay_sinh" name="ngay_sinh" class="form-control" value="<?php echo $ngay_sinh; ?>"
                required />
        </div>

        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input type="text" id="dia_chi" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ"
                value="<?php echo $dia_chi; ?>" required />
        </div>
        <div class="form-group">
            <label for="dien_thoai">Điện thoại</label>
            <input type="text" id="dien_thoai" name="dien_thoai" class="form-control" placeholder="Nhập điện thoại"
                value="<?php echo $dien_thoai; ?>" required />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Nhập email"
                value="<?php echo $email; ?>" required />
        </div>
        <div class="form-group">
            <label for="quyen">Quyền</label>
            <input type="text" id="quyen" name="quyen" class="form-control" placeholder="Nhập quyền"
                value="<?php echo $quyen; ?>" required />
        </div>
        <button type="submit" name="submit" class="btn-submit">Cập nhật</button>
        <button type="reset" class="btn-reset">Làm mới</button>
    </form>

</div>