<?php
include('ketnoi.php');
$tt = $_GET['timkiem'];
$thongtin = '%' . $tt . '%';
$search = "SELECT sanpham.id_sp, sanpham.ten_sp, sanpham.mo_ta, danhmuc.ten_danh_muc,sanpham.don_gia ,sanpham.hinh_anh
            FROM SanPham 
            JOIN danhmuc 
            ON sanpham.id_dm = danhmuc.id_dm 
            WHERE sanpham.ten_sp LIKE '$thongtin' OR sanpham.mo_ta LIKE '$thongtin' OR danhmuc.ten_danh_muc LIKE '$thongtin';";
$result = mysqli_query($conn, $search);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/menuNgang.css">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #0056b3;
            --text-color: #333;
            --bg-color: #f5f5f5;
            --box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--bg-color);
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 80px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-image {
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
        }

        .product-details {
            padding: 15px;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .product-buttons {
            justify-content: space-around;
            margin-bottom: 16px;
        }

        .buy-now-btn,
        .details-btn {
            background-color: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-left: 32px;
        }

        .buy-now-btn:hover,
        .details-btn:hover {
            background-color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <?php include 'header1.php'; ?>
    <?php include 'menuNgang.php'; ?>
    <div class="container">
        <div class="product-grid">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img class="img_item" src="../quantri/images-laptop/<?php echo $row["hinh_anh"]?>" alt="anh san pham">
                        </div>
                        <div class="product-details">
                            <h4 class="product-name"><?php echo $row["ten_sp"]?></h4>
                            <p class="product-price"><?php echo number_format($row["don_gia"], 0, ",", ".")?> VNĐ</p>
                        </div>
                        <div class="product-buttons">
                        <a class="buy-now-btn" onclick="addToCart(<?php echo $row['id_sp']; ?>, 
                      '<?php echo htmlspecialchars($row['ten_sp'], ENT_QUOTES); ?>', 
                      <?php echo $row['don_gia']; ?>, 
                      '<?php echo htmlspecialchars($row['hinh_anh'], ENT_QUOTES); ?>')" href="javascript:void(0);">Mua
                                    ngay</a>
                            <a class="details-btn" href="ChiTietLaptop.php?idsp=<?php echo $row["id_sp"]?>">Xem chi tiết</a>
                        </div>
                    </div>
            <?php
                }
            }else {
                echo "<script>
                alert('Không tìm thấy sản phẩm nào')</script>";
            }
            ?>
        </div>
    </div>
    <script>
        function addToCart(productId, tenSp, gia, hinhAnh) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "them_gio_hang.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Sản phẩm đã được thêm vào giỏ hàng!");
                    window.location.href = "cart.php";
                }
            };
            xhr.send("id_sp=" + productId + "&ten_sp=" + encodeURIComponent(tenSp) + "&gia=" + gia + "&soluong=1&hinh_anh=" + encodeURIComponent(hinhAnh));
        }
    </script>
</body>