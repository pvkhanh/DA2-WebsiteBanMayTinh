<?php
session_start();
include_once('ketnoi.php');  

$error = NULL;
$focus_field = NULL;  
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";

if (isset($_POST['submit'])) {
    if (!isset($_POST["username"]) || $_POST["username"] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "username";
    } elseif (!isset($_POST['mk']) || $_POST['mk'] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "mk";
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$mk'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION["username"] = $username;
            $_SESSION["mk"] = $mk;
            $_SESSION["name"] = $row['name']; 
            $_SESSION["quyen"] = $row['quyen']; 
            if ($row['quyen'] == 0) {
                header("Location: quantri.php");  // Trang quản trị cho admin
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
<html>

<head>
    <meta charset="utf8">
    <title>Nhóm 1 - Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap1.css">
    <style>
        .error-message {
            color: #555;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .error-field {
            border: 1px solid #dd4b39 !important;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php if (!isset($_SESSION['username'])): ?>

        <form method="post" id="loginForm">
            <?php if ($error && !isset($focus_field)): ?>
                <div class="error-message" style="text-align: center; margin-bottom: 10px; color: red; font-size: 16px">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <div id="form-login">
                <h2>Đăng nhập hệ thống quản trị</h2>

                <ul>
                    <li class="input-container">
                        <label>Tài khoản</label>
                        <input type="text" name="username" id="username" placeholder="Tài khoản username"
                               value="<?php echo htmlspecialchars($username); ?>"
                               class="<?php echo (isset($focus_field) && $focus_field == 'username') ? 'error-field' : ''; ?>">
                    </li>
                    <li class="input-container">
                        <label>Mật khẩu</label>
                        <input type="password" name="mk" id="mk" placeholder="Mật khẩu"
                               value="<?php echo htmlspecialchars($mk); ?>"
                               class="<?php echo (isset($focus_field) && $focus_field == 'mk') ? 'error-field' : ''; ?>">
                    </li>
                    <li>
                        <input type="checkbox" name="check" id="check"> Ghi nhớ
                    </li>
                    <li class="button-group">
                        <input type="submit" name="submit" value="Đăng nhập">
                        <input type="reset" value="Làm mới">
                    </li>
                </ul>
            </div>

        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                <?php if (isset($focus_field)): ?>
                    var field = document.getElementById('<?php echo $focus_field; ?>');
                    field.focus();
                    // Đặt con trỏ vào cuối text
                    if (field.value.length) {
                        field.setSelectionRange(field.value.length, field.value.length);
                    }
                <?php endif; ?>
            });
        </script>

    <?php else:

        if ($_SESSION['quyen'] == 0) {
            header('Location: quantri.php');
        } else {
            session_destroy();
            header('Location: ../BanMayTinh/index.php');
        }
        exit();
    endif; ?>
</body>

</html>




