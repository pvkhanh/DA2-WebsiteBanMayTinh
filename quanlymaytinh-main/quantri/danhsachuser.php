<?php
include_once('ketnoi.php');

// Lấy số trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Thiết lập số lượng dòng hiển thị trên mỗi trang
$rowsPerPage = 10;

// Xác định vị trí bắt đầu của dữ liệu cần lấy
$perRow = ($page - 1) * $rowsPerPage;

// Truy vấn danh mục sản phẩm với giới hạn số lượng trang
$sql = "SELECT * FROM users ORDER BY id_user ASC LIMIT $perRow, $rowsPerPage";
$query = mysqli_query($conn, $sql);

// Truy vấn tổng số dòng trong bảng dmsanpham
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));

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
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=danhsachuserr&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="quantri.php?page_layout=danhsachuser&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
<link rel="stylesheet" type="text/css" href="css/danhsachuser.css" />
<h2>Quản Lý User</h2>
<div class="danhsachuser">
    <div class="row" style="display: flex;flex-wrap: wrap;margin-right: 2.25rem;margin-left: -.75rem;">
        <div id="add-sp" style="display: inline-block">
            <a href="quantri.php?page_layout=themuser">Thêm người dùng mới</a>
        </div>
        <div>
            <form action="quantri.php?page_layout=danhsachtkusr" method="POST" class="tkmien">
                <input type="text" name="timkiem" id="timkiem" placeholder="Searching for">
                <input type="submit" value="Tìm kiếm" id="submitsearching" name="searching">
            </form>
        </div>
        <table id="sps" border="0" cellpadding="0" cellspacing="0" width="100%">
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
                <!-- <td width="5%">Email</td> -->
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($query)) {
                // Xử lý dữ liệu trong vòng lặp
            ?>
                <tr>
                    <td><span><?php echo $row['id_user']; ?></span></td>
                    <td class="l5"><a href="quantri.php?page_layout=suauser&id_user=<?php echo $row['id_user']; ?>"><?php echo $row['name']; ?></a></td>
                    <td class="l5"><span><?php echo $row['username']; ?></span></td>
                    <td class="l5"><span><?php echo $row['password']; ?></span></td>
                    <td class="l5"><span><?php echo $row['gioi_tinh']; ?></span></td>
                    <td class="l5"><span><?php echo $row['ngay_sinh']; ?></span></td>
                    <td class="l5"><span><?php echo $row['dia_chi']; ?></span></td>
                    <td class="l5"><?php echo $row['dien_thoai'] ?></td>
                    <td class="l5"><?php echo $row['quyen'] ?></td>
                    <!-- <td class="l5"><?php echo $row['email'] ?></td> -->
                    <td><a href="quantri.php?page_layout=suauser&id_user=<?php echo $row['id_user']; ?>"><span>Sửa</span></a></td>
                    <td>
                        <!-- Cập nhật nút Xóa để hiển thị xác nhận -->
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id_user']; ?>)">
                            <span>Xóa</span>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="pagination">
            <ul>
                <?php echo $listPage; ?>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirmDelete(id_user) {
        // Hiển thị hộp thoại xác nhận
        var isConfirmed = confirm("Bạn có chắc chắn muốn xóa thành viên này không này?");
        if (isConfirmed) {
            // Nếu người dùng xác nhận, chuyển đến trang xóa sản phẩm
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
        margin: 20px 190px 16px 0;
        text-align: center;
        position: absolute;
        right: 0px;
        top: 137px;
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