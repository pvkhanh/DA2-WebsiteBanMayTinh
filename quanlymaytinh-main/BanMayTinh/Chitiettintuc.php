<?php
include('../chucnang/ketnoi.php'); // Kết nối database

// Kiểm tra nếu có id từ URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy id từ URL và chuyển thành số nguyên

    // Truy vấn thông tin chi tiết bài viết theo id
    $sql = "SELECT id, title, content, created_at, image FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Bảo vệ query bằng cách truyền tham số vào
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Bài viết không tồn tại.";
        exit;
    }
} else {
    echo "Không có bài viết nào được chọn.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?></title>

    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/banner.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/menuNgang.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .news-detail {
            max-width: 1400px;
            margin: 30px auto;
            margin-top: 80px;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .news-detail img {
            width: 300px;
            /* Điều chỉnh kích thước hình ảnh */
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }


        .news-detail h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .news-detail .date {
            font-size: 1rem;
            color: #888;
            margin-bottom: 20px;
        }

        .news-detail .content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }

        .news-detail a {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .news-detail a:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .news-detail {
                padding: 15px;
            }

            .news-detail h1 {
                font-size: 2rem;
            }

            .news-detail .content {
                font-size: 1rem;
            }

            
        }
        .search-box button {
                right: -42px;
                top: 0px;
            }
    </style>
</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="news-detail">
        <h1><?php echo htmlspecialchars($row['title']); ?></h1>
        <p class="date">Ngày đăng: <?php echo date("d-m-Y", strtotime($row['created_at'])); ?></p>

        <!-- Hiển thị hình ảnh chi tiết -->
        <img src="../quantri/images-laptop/<?php echo htmlspecialchars($row['image']); ?>" alt="Hình ảnh bài viết">

        <!-- Nội dung chi tiết bài viết -->
        <div class="content">
            <?php echo nl2br(htmlspecialchars($row['content'])); ?>
        </div>
    </div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>

<?php $conn->close(); ?>