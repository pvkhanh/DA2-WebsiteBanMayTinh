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
}

textarea {
    resize: vertical;
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

.alert {
    padding: 15px;
    background-color: #f44336;
    color: white;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 16px;
}

.alert.success {
    background-color: #4CAF50;
}

.alert.info {
    background-color: #2196F3;
}

.alert.warning {
    background-color: #ff9800;
}


.alert.success {
    background-color: #4CAF50;
}


.alert.error {
    background-color: #f44336;
}


textarea {
    min-height: 100px;
}

input[type="text"],
textarea {
    box-sizing: border-box;
}

@media screen and (max-width: 768px) {
    form {
        width: 90%;
    }
    h1 {
        font-size: 20px;
    }
}
</style>
<?php
include_once('ketnoi.php'); 
if (isset($_GET['id_dm'])) {
    $id_dm = $_GET['id_dm']; 

    $sql = "SELECT * FROM danhmuc WHERE id_dm = '$id_dm'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $ten_dm = $row['ten_danh_muc'];
        $nha_san_xuat = $row['nha_san_xuat'];
        $mo_ta = $row['mo_ta'];
    } else {
        echo "<script>alert('Danh mục không tồn tại'); window.location.href='quantri.php?page_layout=danhsachdm';</script>";
        exit();
    }
} else {
    echo "<script>alert('Không tìm thấy danh mục để sửa'); window.location.href='quantri.php?page_layout=danhsachdm';</script>";
    exit();
}

if (isset($_POST['submit'])) {
    $ten_dm = $_POST['ten_dm'];
    $nha_san_xuat = $_POST['nha_san_xuat'];
    $mo_ta = $_POST['mo_ta'];
    if ($ten_dm == $row['ten_danh_muc'] && $nha_san_xuat == $row['nha_san_xuat'] && $mo_ta == $row['mo_ta']) {
        echo "<script>alert('Không có thay đổi nào để cập nhật.');
        window.location.href = 'quantri.php?page_layout=danhsachdm';</script>";
        exit();

    } else {
        if (isset($ten_dm) && !empty($ten_dm) && isset($nha_san_xuat) && !empty($nha_san_xuat) && isset($mo_ta) && !empty($mo_ta)) {
            $sql = "UPDATE danhmuc SET ten_danh_muc = '$ten_dm', nha_san_xuat = '$nha_san_xuat', mo_ta = '$mo_ta' WHERE id_dm = '$id_dm'";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "<script>
                        alert('Cập nhật danh mục thành công!');
                        window.location.href = 'quantri.php?page_layout=danhsachdm';
                      </script>";
                exit(); 
            } else {
                echo "Lỗi truy vấn: " . mysqli_error($conn);
            }
        } else {
            echo "Vui lòng nhập đầy đủ thông tin!";
        }
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/suadm.css" />
<h1>Sửa Danh Mục</h1>
<div class="suadm">
    <form method="POST" action="suadm.php?id_dm=<?php echo $id_dm; ?>"> 
        <div class="form-group">
            <label for="ten_dm">Tên danh mục</label>
            <input type="text" id="ten_dm" name="ten_dm" class="form-control" placeholder="Nhập tên danh mục"
                value="<?php echo $ten_dm; ?>" required />
        </div>
        <div class="form-group">
            <label for="nha_san_xuat">Nhà sản xuất</label>
            <input type="text" id="nha_san_xuat" name="nha_san_xuat" class="form-control"
                placeholder="Nhập nhà sản xuất" value="<?php echo $nha_san_xuat; ?>" required />
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4" placeholder="Nhập mô tả danh mục"
                required><?php echo $mo_ta; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn-submit">Cập nhật</button>
        <button type="reset" class="btn-reset">Làm mới</button>
    </form>

</div>