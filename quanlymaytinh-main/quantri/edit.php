<?php
require 'ketnoi.php';

// Kiểm tra nếu tham số 'id' có tồn tại trong URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sử dụng câu lệnh SQL chuẩn bị với dấu hỏi cho tham số
    $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);  // 'i' nghĩa là tham số 'id' là kiểu integer
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Lấy dữ liệu và hiển thị trong form (Ví dụ)
        $title = $row['title'];
        $content = $row['content'];
    } else {
        echo "Không tìm thấy bài viết!";
    }
} else {
    echo "ID không hợp lệ!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa tin tức</title>
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
        <h1>Chỉnh sửa tin tức</h1>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nội dung:</label>
                <textarea name="content" required><?php echo htmlspecialchars($content); ?></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit">Cập nhật</button>
                <button type="reset">Nhập lại</button>
            </div>
        </form>
    </div>
</body>
</html>