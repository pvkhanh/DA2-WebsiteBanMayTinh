<?php
ob_start();
include('ketnoi.php');
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trang chủ quản trị</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Đơn Hàng -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">120</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bình Luận -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Bình luận</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">52</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Thành Viên -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Thành viên</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php $sql = "SELECT COUNT(id_user) AS total_members FROM users";
                                $result = $conn->query($sql);

                                // Kiểm tra và lấy kết quả
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $totalMembers = $row['total_members'];
                                    echo $totalMembers; // Hiển thị kết quả
                                } else {
                                    echo "Không có dữ liệu.";
                                } ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-alt" style="font-size: 30px; color: rgb(192, 187, 187);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Người Xem -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số lần truy cập</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php include '../chucnang/thongke/thongke.php' ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-desktop" style="font-size: 30px; color: rgb(192, 187, 187);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Giới thiệu -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Giới thiệu</h6>
            </div>
            <div class="card-body">
                <h1>Quản lý kinh doanh laptop - Nhóm 1</h1>
                <h5>Thành viên:</h5>
                <p>Phan Văn Khánh - Nhóm trưởng</p>
                <p>Nguyễn Trọng Bắc</p>
                <p>Hà Gia Kiệt</p>
                <p>Lê Thị Thu Huyền</p>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->