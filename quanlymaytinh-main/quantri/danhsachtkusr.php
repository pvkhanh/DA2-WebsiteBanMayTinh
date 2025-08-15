<?php
include('ketnoi.php');
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
            echo "<script>alert('Chưa nhập nội dung tìm kiếm')
            window.location.href='quantri.php?page_layout=danhsachuser'</script>";
        } else {
            $tt = $_POST['timkiem'];
            $thongtin = '%' . $tt . '%';
            $search = "SELECT * FROM users WHERE name LIKE '$thongtin' OR username LIKE '$thongtin' OR gioi_tinh LIKE '$thongtin' OR dia_chi LIKE '$thongtin' OR ngay_sinh LIKE '$thongtin' OR dien_thoai LIKE '$thongtin' OR quyen LIKE '$thongtin'  ORDER BY id_user ASC LIMIT $perRow, $rowsPerPage";
            $result = mysqli_query($conn, $search);
            if (mysqli_num_rows($result) > 0) {
                echo '<h2>Quản Lý Sản Phẩm</h2>';
                echo '<div id="add-sp" style="display: inline-block">
            <a href="quantri.php?page_layout=themuser">Thêm người dùng mới</a>
        </div>
        <div>
            <form action="quantri.php?page_layout=danhsachtkusr" method="POST" class="tkmien">
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
                        <td width="15%">Họ tên</td>
                        <td width="10%">Tên đăng nhập</td>
                        <td width="10%">Mật khẩu</td>
                        <td width="5%">Giới tính</td>
                        <td width="10%">Ngày sinh</td>
                        <td width="5%">Địa chỉ</td>
                        <td width="5%">Điện thoại</td>
                        <td width="5%">Quyền</td>
                        <td width="5%">Sửa</td>
                        <td width="5%">Xóa</td>
                        </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td  class="l5"><span>' . $row['id_user'] . '<span></td>
                        <td  class="l5">' . $row['name'] . '</td>
                        <td class="l5">' . $row['username'] . '</td>
                        <td class="l5">' . $row['password'] . '</td>
                        <td  class="l5">' . $row['gioi_tinh'] . '</td>
                        <td  class="l5">' . $row['ngay_sinh'] . '</td>
                        <td  class="l5">' . $row['dia_chi'] . '</td>
                        <td  class="l5">' . $row['dien_thoai'] . '</td>
                        <td  class="l5">' . $row['quyen'] . '</td>
                        <td class="l5"><a href="quantri.php?page_layout=suauser&id_user=' . $row['id_user'] . '"><span>Sửa</span></a></td>
                        <td class="l5">
                        <!-- Cập nhật nút Xóa để hiển thị xác nhận -->
                        <a href="javascript:void(0);" onclick="confirmDelete(' . $row['id_user'] . ')">
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
                window.location.href='quantri.php?page_layout=danhsachuser'</script>";
            }
        }
    }
}
?>
<script type="text/javascript">
    function confirmDelete(id_user) {
        var isConfirmed = confirm("Bạn có chắc chắn muốn xóa người dùng này?");
        if (isConfirmed) {
            window.location.href = "xoauser.php?id_user=" + id_user;
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
        border-radius: 4px;
        margin: 4px;
        top: -6px;
    }
    #submitsearching:hover{
        cursor: pointer;
        opacity: 0.6;
    }
    input#timkiem {
        border-radius: 4px;
        border: 1px solid gray;
        padding: 4px;
    }
    input#timkiem:focus{
        color: #6e707e;
        background-color: #fff;
        border-color: #bac8f3;
        outline: 0;
        box-shadow: 0 0 0 .2rem rgba(78, 115, 223, .25);
    }
</style>