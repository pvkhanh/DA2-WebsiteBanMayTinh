<?php
// Kết nối cơ sở dữ liệu
include("ketnoi.php");

$sql = "SELECT * FROM sanpham";
$params = [];
$where_clauses = [];

// Xử lý IDDM
if (isset($_GET['iddm'])) {
    $iddm = $_GET['iddm']; // Giữ nguyên chuỗi để hỗ trợ nhiều ID
    $where_clauses[] = "id_dm IN ($iddm)";
}

// Xử lý khoảng giá
if (isset($_GET['min'], $_GET['max'])) {
    $min = intval($_GET['min']);
    $max = intval($_GET['max']);
    $where_clauses[] = "don_gia BETWEEN $min AND $max";
}

// Kết hợp điều kiện WHERE nếu có
if (!empty($where_clauses)) {
    $sql .= " WHERE " . implode(" AND ", $where_clauses);
}

// Chuẩn bị truy vấn
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
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
            display: flex;
            justify-content: space-between;
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
        }

        .buy-now-btn:hover,
        .details-btn:hover {
            background-color: var(--secondary-color);
        }

        .search-box button {
            position: absolute;
            right: -47px;
            top: 1px;
            width: 30px;
            height: 30px;
            background: url('https://fptshop.com.vn/Content/v5/images/header/icon-search.png') center center no-repeat rgba(0, 0, 0, 0.3);
            background-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            padding: 0;
        }
    </style>
</head>

<body>
    <?php include 'header1.php'; ?>
    <?php include 'menuNgang.php'; ?>
    <div class="container">
        <div class="product-grid">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="../quantri/images-laptop/<?php echo htmlspecialchars($row['hinh_anh']); ?>"
                                alt="<?php echo htmlspecialchars($row['ten_sp']); ?>">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><?php echo htmlspecialchars($row['ten_sp']); ?></h3>
                            <p class="product-price"><?php echo number_format($row['don_gia'], 0, ',', '.'); ?> VNĐ</p>
                            <div class="product-buttons">
                                <a class="buy-now-btn" onclick="addToCart(<?php echo $row['id_sp']; ?>, 
                      '<?php echo htmlspecialchars($row['ten_sp'], ENT_QUOTES); ?>', 
                      <?php echo $row['don_gia']; ?>, 
                      '<?php echo htmlspecialchars($row['hinh_anh'], ENT_QUOTES); ?>')" href="javascript:void(0);">Mua
                                    ngay</a>

                                <a class="details-btn" href="ChiTietLaptop.php?idsp=<?php echo $row['id_sp']; ?>">Xem chi
                                    tiết</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Không tìm thấy sản phẩm nào!</p>";
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

</html>