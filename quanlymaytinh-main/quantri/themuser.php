<?php
include('ketnoi.php');

// Khai báo các biến với giá trị mặc định
$name = $username = $password = $gioi_tinh = $ngay_sinh = $dia_chi = $dien_thoai = $email = $quyen = '';
$error_name = $error_username = $error_password = $error_gioi_tinh = $error_ngay_sinh = $error_dia_chi = $error_dien_thoai = $error_email = $error_quyen = $error_form = '';

if (isset($_POST['submit'])) {
    // Làm sạch dữ liệu
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gioi_tinh = mysqli_real_escape_string($conn, $_POST['gioi_tinh']);
    $ngay_sinh = mysqli_real_escape_string($conn, $_POST['ngay_sinh']);
    $dia_chi = mysqli_real_escape_string($conn, $_POST['dia_chi']);
    $dien_thoai = mysqli_real_escape_string($conn, $_POST['dien_thoai']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $quyen = mysqli_real_escape_string($conn, $_POST['quyen']);

    // Kiểm tra lỗi
    if (empty($name))
        $error_name = '<span style="color:red;">(*) Vui lòng nhập họ tên</span>';
    if (empty($username))
        $error_username = '<span style="color:red;">(*) Vui lòng nhập tên đăng nhập</span>';
    if (empty($password))
        $error_password = '<span style="color:red;">(*) Vui lòng nhập mật khẩu</span>';
    if (!DateTime::createFromFormat('Y-m-d', $ngay_sinh))
        $error_ngay_sinh = '<span style="color:red;">(*) Ngày sinh không hợp lệ</span>';
    if (!isset($quyen))
        $error_quyen = '<span style="color:red;">(*) Vui lòng nhập quyền</span>';

    // Kiểm tra username đã tồn tại
    $sqlCheck = "SELECT * FROM users WHERE username = '$username'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    if (mysqli_num_rows($queryCheck) > 0) {
        $error_username = '<span style="color:red;">(*) Tài khoản này đã tồn tại</span>';
    }

    // Nếu không có lỗi, thêm dữ liệu
    if (empty($error_name) && empty($error_username) && empty($error_password) && empty($error_ngay_sinh) && empty($error_quyen)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`name`, `username`, `password`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `dien_thoai`, `email`, `quyen`) 
        VALUES ('$name', '$username', '$hashed_password', '$gioi_tinh', '$ngay_sinh', '$dia_chi', '$dien_thoai', '$email', '$quyen')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>
                    alert('Thêm mới thành viên thành công!');
                    window.location.href = 'quantri.php?page_layout=danhsachuser'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Lỗi khi thêm thành viên: " . mysqli_error($conn) . "');
                  </script>";
        }
    }
}
?>


<script>
    function validateForm() {
        var name = document.forms["productForm"]["name"];
        var username = document.forms["productForm"]["username"];
        var password = document.forms["productForm"]["password"];
        var gioi_tinh = document.forms["productForm"]["gioi_tinh"];
        var ngay_sinh = document.forms["productForm"]["ngay_sinh"];
        var dia_chi = document.forms["productForm"]["dia_chi"];
        var dien_thoai = document.forms["productForm"]["dien_thoai"];
        var email = document.forms["productForm"]["email"];
        var quyen = document.forms["productForm"]["quyen"];

        if (name.value.trim() === "") {
            alert("Vui lòng nhập họ tên.");
            name.focus();
            return false;
        }
        if (username.value.trim() === "") {
            alert("Vui lòng nhập tên đăng nhập.");
            username.focus();
            return false;
        }
        if (password.value.trim() === "") {
            alert("Vui lòng nhập mật khẩu.");
            password.focus();
            return false;
        }
        if (gioi_tinh.value.trim() === "") {
            alert("Vui lòng nhập giới tính.");
            gioi_tinh.focus();
            return false;
        }
        if (ngay_sinh.value.trim() === "") {
            alert("Vui lòng nhập ngày sinh.");
            ngay_sinh.focus();
            return false;
        }
        if (dia_chi.value.trim() === "") {
            alert("Vui lòng nhập địa chỉ.");
            dia_chi.focus();
            return false;
        }
        if (dien_thoai.value.trim() === "") {
            alert("Vui lòng nhập điện thoại.");
            dien_thoai.focus();
            return false;
        }
        if (email.value.trim() === "") {
            alert("Vui lòng nhập email.");
            email.focus();
            return false;
        }
        if (quyen.value.trim() === "") {
            alert("Vui lòng nhập quyền.");
            quyen.focus();
            return false;
        }
        return true;
    }
</script>

<link rel="stylesheet" type="text/css" href="css/themuser.css">
<h2>Thêm mới sản phẩm</h2>
<div class="themuser">
    <div class="row">
        <form name="productForm" method="post" enctype="multipart/form-data" action="quantri.php?page_layout=themuser"
            onsubmit="return validateForm()">
            <!-- Các trường nhập liệu của form -->
            <div class="left-column">
                <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><label>Họ tên</label><br />
                            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" />
                            <?php if (isset($error_name))
                                echo $error_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Tên đăng nhập</label><br />
                            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" />
                            <?php if (isset($error_username))
                                echo $error_username; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Mật khẩu</label><br />
                            <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>" />
                            <?php if (isset($error_password))
                                echo $error_password; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Giới tính</label><br />
                            <select name="gioi_tinh" style="width: 100%; height: 40px;">
                                <option value="Nam" <?php if ($gioi_tinh === 'Nam')
                                    echo 'selected'; ?>>Nam</option>
                                <option value="Nữ" <?php if ($gioi_tinh === 'Nữ')
                                    echo 'selected'; ?>>Nữ</option>
                                <option value="Khác" <?php if ($gioi_tinh === 'Khác')
                                    echo 'selected'; ?>>Khác</option>
                            </select>
                            <?php if (isset($error_gioi_tinh))
                                echo $error_gioi_tinh; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Ngày sinh</label><br />
                            <input style="width: 100%; height: 40px;" type="date" name="ngay_sinh"
                                value="<?php echo htmlspecialchars($ngay_sinh); ?>" />
                            <?php if (isset($error_ngay_sinh))
                                echo $error_ngay_sinh; ?>
                        </td>
                    </tr>
                    <tr></tr>
                </table>
                <!-- Nút submit và reset -->
                <input type="submit" name="submit" value="Thêm mới" />
                <input type="reset" name="reset" value="Làm mới" />
                <?php if (isset($error_form))
                    echo $error_form; ?>
            </div>

            <div class="right-column">
                <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><label>Địa chỉ</label><br />
                            <input type="text" name="dia_chi" value="<?php echo htmlspecialchars($dia_chi); ?>" />
                            <?php if (isset($error_dia_chi))
                                echo $error_dia_chi; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Điện thoại</label><br />
                            <input type="text" name="dien_thoai" value="<?php echo htmlspecialchars($dien_thoai); ?>" />
                            <?php if (isset($error_dien_thoai))
                                echo $error_dien_thoai; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Email</label><br />
                            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                            <?php if (isset($error_email))
                                echo $error_email; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quyền</label><br />
                            <select name="quyen" style="width: 100%; height: 40px;">
                                <option value="0" <?php if ($quyen === '0')
                                    echo 'selected'; ?>>Admin</option>
                                <option value="1" <?php if ($quyen === '1')
                                    echo 'selected'; ?>>User</option>
                            </select>
                            <?php if (isset($error_quyen))
                                echo $error_quyen; ?>
                        </td>
                    </tr>

                    <tr></tr>
                    <tr></tr>
                </table>
            </div>
        </form>
    </div>
</div>