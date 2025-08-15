<?php
require 'ketnoi.php';

// Lấy số trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Thiết lập số lượng dòng hiển thị trên mỗi trang
$rowsPerPage = 10;

// Xác định vị trí bắt đầu của dữ liệu cần lấy
$perRow = ($page - 1) * $rowsPerPage;

// Truy vấn tin tức với giới hạn số lượng trang
$sql = "SELECT * FROM news ORDER BY created_at DESC LIMIT $perRow, $rowsPerPage";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Truy vấn tổng số dòng trong bảng news
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));

// Tính tổng số trang
$totalPage = ceil($totalRows / $rowsPerPage);

// Tạo liên kết phân trang
$listPage = '';
$maxPagesToShow = 5; // Số trang tối đa để hiển thị
$startPage = max(1, $page - floor($maxPagesToShow / 2));
$endPage = min($totalPage, $startPage + $maxPagesToShow - 1);

// Tạo liên kết phân trang
for ($i = $startPage; $i <= $endPage; $i++) {
    if ($page == $i) {
        $listPage .= '<li class="active"><a href="indextintuc.php?page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="indextintuc.php?page=' . $i . '">' . $i . '</a></li>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Danh sách tin tức</title>
    <link rel="stylesheet" type="text/css" href="css/danhsachdm1.css" />
    <link rel="stylesheet" type="text/css" href="css/danhsachdm.css" />
    <style>
        .pagination {
            display: inline-block;
            margin: 20px 0;
            text-align: right;
            /* Đưa phân trang sang bên phải */
            width: 100%;
            /* Đảm bảo phân trang chiếm toàn bộ chiều rộng của phần tử cha */
        }


        /* Định dạng cho mỗi trang */

        .pagination li {
            display: inline;
            margin: 0 2px;
        }


        /* Định dạng cho các liên kết phân trang */

        .pagination li a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }


        /* Định dạng khi hover vào liên kết */

        .pagination li a:hover {
            background-color: #007bff;
            color: white;
        }


        /* Định dạng cho trang đang được chọn */

        .pagination li.active a {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            font-weight: bold;
        }


        /* Định dạng cho liên kết phân trang bị vô hiệu hóa (trang đầu và cuối) */

        .pagination li.disabled a {
            color: #ccc;
            pointer-events: none;
            background-color: #f0f0f0;
            border-color: #ccc;
        }
    </style>
</head>

<body>
    <h2>Quản lý tin tức</h2>
    <div class="danhsachtin">
        <div class="row">
            <div id="add-tin" style="display: inline-block">
                <a href="quantri.php?page_layout=add1">Thêm tin tức mới</a>
            </div>
            <table border="1" width="100%">
                <tr>
                    <td width="5%">ID</td>
                    <td width="20%">Tiêu đề</td>
                    <td width="50%">Nội dung</td>
                    <td width="10%">Sửa</td>
                    <td width="10%">Xóa</td>
                </tr>
                <?php while ($item = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td>
                            <a href="quantri.php?page_layout=edit1&id=<?php echo $item['id']; ?>">
                                <?php echo htmlspecialchars($item['title']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars(substr($item['content'], 0, 100)); ?>...</td>
                        <td>
                            <a href="quantri.php?page_layout=edit1&id=<?php echo $item['id']; ?>"><span>Sửa</span></a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $item['id']; ?>)">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <div class="pagination">
                <ul>
                    <?php echo $listPage; ?>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function confirmDelete(id) {
            var isConfirmed = confirm("Bạn có chắc chắn muốn xóa tin tức này?");
            if (isConfirmed) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</body>

</html>