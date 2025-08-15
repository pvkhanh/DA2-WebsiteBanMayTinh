<?php
session_start();
include_once('ketnoi.php');

// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION["username"])) {
    header('Location: index.php');
    exit();
}

// Lấy thông tin tài khoản từ cơ sở dữ liệu
$username = $_SESSION["username"];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "Không tìm thấy thông tin tài khoản.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 100px);
            /* Trừ đi chiều cao header/footer nếu có */
            text-align: center;
        }

        .info-card {
            width: 50%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="container mt-5">
            <h2 class="text-center">Thông tin tài khoản</h2>
            <div class="card">
                <div class="card-body">
                    <p><strong>Tên đăng nhập:</strong> <?php echo $user['username']; ?></p>
                    <p><strong>Họ và tên:</strong> <?php echo $user['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>Số điện thoại:</strong> <?php echo $user['dien_thoai']; ?></p>
                    <p><strong>Địa chỉ:</strong> <?php echo $user['dia_chi']; ?></p>
                </div>
            </div>
            <a href="quantri.php" class="btn btn-primary mt-3">Quay lại</a>
        </div>
    </div>
</body>

</html>