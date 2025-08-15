<?php
include('../chucnang/ketnoi.php'); // Kết nối database

// Truy vấn danh sách tin tức
$sql = "SELECT id, title, content, created_at, image FROM news ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tin Tức</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/banner.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/menuNgang.css">
    
    <style>
        

        .news-list {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .news-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .news-item img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .news-item h3 {
            font-size: 1.5rem;
            margin: 0;
        }

        .news-item p {
            font-size: 1rem;
            margin: 5px 0;
            color: #555;
        }

        .news-item .date {
            font-size: 0.9rem;
            color: #888;
        }

        .news-item a {
            color: #007bff;
            text-decoration: none;
        }

        .news-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="news-list">
        <h1>Danh Sách Tin Tức</h1>
        <!-- Kiểm tra nếu có dữ liệu -->
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="news-item">
                    <!-- Hiển thị hình ảnh -->
                    <img src="../quantri/images-laptop/<?php echo htmlspecialchars($row['image']); ?>" alt="Hình ảnh bài viết">
                    
                    <!-- Nội dung bài viết -->
                    <div>
                        <h3><a href="chitiettintuc.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a></h3>
                        <p class="date">Ngày đăng: <?php echo date("d-m-Y", strtotime($row['created_at'])); ?></p>
                        <p><?php echo substr(htmlspecialchars($row['content']), 0, 150); ?>...</p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Không có tin tức nào để hiển thị.</p>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>
</html>
