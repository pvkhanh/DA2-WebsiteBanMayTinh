<?php
require 'ketnoi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    $stmt = $conn->prepare("INSERT INTO news (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        echo "<script>alert('Thêm tin tức thành công!');window.location.href='quantri.php?page_layout=danhsachtintuc'</script>";
    } else {
        echo "<script>alert('Có lỗi khi thêm tin tức.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin tức</title>
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
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
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

        @media screen and (max-width: 768px) {
            .suadm {
                width: 90%;
            }
            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="suadm">
        <h1>Thêm tin tức mới</h1>
        <form method="POST">
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-group">
                <label>Nội dung:</label>
                <textarea name="content" required></textarea>
            </div>
            <button type="submit">Thêm</button>
            <button type="reset">Làm lại</button>
        </form>
    </div>
</body>
</html>
