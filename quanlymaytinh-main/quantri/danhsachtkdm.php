<?php
include('../chucnang/ketnoi.php');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowsPerPage = 10;  // Số lượng dòng hiển thị mỗi trang
$perRow = $page * $rowsPerPage - $rowsPerPage;  // Xác định vị trí bắt đầu của dữ liệu cần
?>

<link rel="stylesheet" type="text/css" href="css/danhsachsp1.css" />
<?php
if (isset($_POST['searching'])) { {
        if (empty($_POST['timkiem'])) {
            echo "<script>alert('Chưa nhập nội dung tìm kiếm')</script>";
        } else {
            $tt = $_POST['timkiem'];
            $thongtin = '%' . $tt . '%';
            $search = "SELECT * FROM danhmuc 
                            WHERE danhmuc.ten_danh_muc LIKE '$thongtin' OR danhmuc.nha_san_xuat LIKE '$thongtin' ORDER BY id_dm ASC LIMIT $perRow, $rowsPerPage";
            $result = mysqli_query($conn, $search);
            if (mysqli_num_rows($result) > 0) {
                echo '<h2>Quản Lý Danh Mục</h2>';
                echo '<div id="add-sp" style="display: inline-block">
            <a href="quantri.php?page_layout=themdm">Thêm danh mục mới</a>
        </div>
        <div>
            <form action="quantri.php?page_layout=danhsachtkdm" method="POST" class="tkmien">
                <input type="text" name="timkiem" id="timkiem" placeholder="Searching for"/>
                <input type="submit" value="Tìm kiếm" id="submitsearching" name="searching" />
            </form>
        </div>';

                $totalRows = mysqli_num_rows($result);

                // Tính tổng số trang
                $totalPage = ceil($totalRows / $rowsPerPage);

                // Tạo liên kết phân trang
                $listPage = '';
                $maxPagesToShow = 5; // Số trang tối đa để hiển thị
                $startPage = max(1, $page - floor($maxPagesToShow / 2));
                $endPage = min($totalPage, $startPage + $maxPagesToShow - 1);
                echo '<table id="sps" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr id="sp-bar">
                        <td width="5%">ID</td>
                        <td width="20%">Tên danh mục</td>
                        <td width="25%">Nhà sản xuất</td>
                        <td width="40%">Mô tả</td>
                        <td width="5%">Sửa</td>
                        <td width="5%">Xóa</td>
                        </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td  class="l5"><span>' . $row['id_dm'] . '<span></td>
                         <td class="l5"><a
                            href="quantri.php?page_layout=suadm&id_dm='.$row["id_dm"].'">'. $row["ten_danh_muc"].'</a>
                    </td>
                    <td  class="l5">' . $row['nha_san_xuat'] . '</td>
                    <td  class="l5">' . $row['mo_ta'] . '</td>
                        <td class="l5"><a href="quantri.php?page_layout=suadm&id_dm=' . $row['id_dm'] . '"><span>Sửa</span></a></td>
                        <td class="l5">
                        <!-- Cập nhật nút Xóa để hiển thị xác nhận -->
                        <a href="javascript:void(0);" onclick="confirmDelete(' . $row['id_dm'] . ')">
                            <span>Xóa</span>
                        </a>
                        </td>
                        </tr>';
                }
                echo '</table>
                <div class="pagination">
                    <ul>
                        <?php echo $listPage; ?>
                    </ul>
                </div>';
            } else {
                echo "<script>alert('Không tìm thấy thông tin')
                window.location.href='quantri.php?page_layout=danhsachdm'</script>";
            }
        }
    }
}
?>
<script type="text/javascript">
    function confirmDelete(id_sp) {
        var isConfirmed = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
        if (isConfirmed) {
            window.location.href = "xoadm.php?id_dm=" + id_dm;
        }
    }
</script>
<style>
    .tkmien {
        width: 250px;
        height: 30px;
        border-radius: 10px;
        font-size: 20px;
        margin: 20px 144px 16px 0;
        text-align: center;
        position: absolute;
        right: 0px;
        top: 118px;
    }

    #submitsearching {
        position: absolute;
        background-color: royalblue;
        color: #fff;
        border: none;
        padding: 4px 14px;
        border-radius: 10px;
        margin: 4px;
        top: -6px;
    }

    input#timkiem {
        border-radius: 10px;
        border: 1px solid blue;
        padding: 4px;
    }
</style>