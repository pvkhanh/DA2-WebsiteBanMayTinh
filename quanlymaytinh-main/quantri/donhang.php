<?php
include_once('../BanMayTinh/ketnoi.php');

// Lấy số trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Thiết lập số lượng dòng hiển thị trên mỗi trang
$rowsPerPage = 10;

// Xác định vị trí bắt đầu của dữ liệu cần lấy
$perRow = ($page - 1) * $rowsPerPage;

// Truy vấn danh mục sản phẩm với giới hạn số lượng trang
$sql = "SELECT * FROM donhang LIMIT $perRow, $rowsPerPage";
$result = mysqli_query($conn, $sql);

// Truy vấn tổng số dòng trong bảng dmsanpham
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donhang"));

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
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=danhsachdonhang&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="quantri.php?page_layout=danhsachdonhang&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn Hàng</title>
    <link rel="stylesheet" href="css/danhsachdonhang.css">
</head>

<body>
    <h1>Danh Sách Đơn Hàng</h1>
    <table>
        <thead>
            <tr>
                <th>ID Đơn Hàng</th>
                <th>ID Khách Hàng</th>
                <th>Ngày Tạo</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_donhang'] ?></td>
                        <td><?= $row['id_user'] ?></td>
                        <td><?= $row['ngay_tao'] ?></td>
                        <td><?= $row['trang_thai'] ?></td>
                        <td>
                            <!-- Form để cập nhật trạng thái đơn hàng -->
                            <form action="xulydonhang.php" method="POST" style="display: inline;">
                                <input type="hidden" name="id_donhang" value="<?= $row['id_donhang'] ?>">
                                <select name="trang_thai">
                                    <option value="Chờ xử lý" <?= $row['trang_thai'] == 'Chờ xử lý' ? 'selected' : '' ?>>Chờ xử lý
                                    </option>
                                    <option value="Huỷ" <?= $row['trang_thai'] == 'Huỷ' ? 'selected' : '' ?>>Huỷ
                                    </option>
                                    <option value="Đang giao hàng" <?= $row['trang_thai'] == 'Đang giao hàng' ? 'selected' : '' ?>>
                                        Đang giao hàng</option>
                                    <option value="Hoàn thành" <?= $row['trang_thai'] == 'Hoàn thành' ? 'selected' : '' ?>>Hoàn
                                        thành</option>
                                </select>
                                <button type="submit" class="btn">Cập nhật</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có đơn hàng nào!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="pagination">
        <ul>
            <?php echo $listPage; ?>
        </ul>
    </div>
</body>

</html>

<?php
$conn->close();
?>