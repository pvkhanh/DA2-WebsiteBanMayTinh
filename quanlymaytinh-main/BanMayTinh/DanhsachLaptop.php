<?php
include('../chucnang/ketnoi.php');
// Kiểm tra nếu khách hàng đã đăng nhập
$idkh = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : null;

// Nếu khách hàng chưa đăng nhập, điều hướng tới trang đăng nhập
// if (!$idkh) {
//   echo "<script>alert('Bạn cần đăng nhập để sử dụng tính năng này!'); window.location.href='login.php';</script>";
//   exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh Sách Laptop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    .product-showcase {
      display: flex;
      overflow: hidden;
      width: 100%;
      position: relative;
    }

    h1 {
      text-align: center;
    }

    .product-showcase::-webkit-scrollbar {
      display: none;
    }

    .product-card {
      min-width: 200px;
      margin: 10px;
      background-color: #f1f1f1;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    .product-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 10px;
    }

    .product-buttons a {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
      padding: 8px 9px;
      text-align: center;
      text-decoration: none;
      border-radius: 100px;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .product-buttons a:hover {
      background-color: #2980b9;
    }

    .product-buttons i {
      margin-right: 5px;
    }

    .item-image {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .item-title {
      font-size: 1.2em;
      margin: 10px 0;
    }

    .item-price {
      font-size: 1em;
      color: #e74c3c;
    }

    /* Updated navigation button styles */
    .slick-prev,
    .slick-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 1;
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      display: flex !important;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: #333;
      transition: all 0.3s ease;
    }

    .slick-prev {
      left: -20px;
    }

    .slick-next {
      right: -20px;
    }

    .slick-prev:hover,
    .slick-next:hover {
      background-color: rgba(255, 255, 255, 1);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .slick-prev:before,
    .slick-next:before {
      display: none;
    }

    /* Container style to make space for arrows */
    .product-row-container {
      padding: 0 30px;
      position: relative;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>DANH SÁCH LAPTOP</h1>
    <div class="product-row-container">
      <div class="product-showcase" id="productRow">
        <?php
        $sql = "SELECT * FROM sanpham WHERE sanpham.id_dm BETWEEN 0 and 10";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
          ?>
          <div class="product-card">
            <img src="../quantri/images-laptop/<?php echo $row['hinh_anh']; ?>" alt="<?php echo $row['ten_sp']; ?>"
              class="item-image">
            <div class="product-details">
              <h3 class="item-title"><?php echo $row['ten_sp']; ?></h3>
              <p class="item-price"><?php echo number_format($row['don_gia'], 0, ',', '.'); ?> VNĐ</p>
              <div class="product-buttons">
                <a onclick="addToCart(<?php echo $row['id_sp']; ?>, '<?php echo addslashes($row['ten_sp']); ?>', <?php echo $row['don_gia']; ?>, '<?php echo addslashes($row['hinh_anh']); ?>')"
                  title="Mua ngay">
                  <i class="fas fa-shopping-cart"></i>
                </a>
                <a href="ChiTietLaptop.php?idsp=<?php echo $row['id_sp']; ?>" title="Xem chi tiết">
                  <i class="fas fa-info-circle"></i>
                </a>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <script type="text/javascript">
    const idkh = <?php echo json_encode($idkh); ?>; // Lấy idkh từ PHP

    $(document).ready(function () {
      $('.product-showcase').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
        ]
      });
    });

    function addToCart(productId, tenSp, gia, hinhAnh) {
      if (!idkh) {
        alert("Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!");
        return;
      }

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "them_gio_hang.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert("Sản phẩm đã được thêm vào giỏ hàng!");
          window.location.href = "cart.php";  // Chuyển hướng đến trang giỏ hàng
        }
      };
      xhr.send("id_sp=" + productId + "&id_user=" + idkh + "&ten_sp=" + encodeURIComponent(tenSp) + "&gia=" + gia + "&soluong=1" + "&hinh_anh=" + encodeURIComponent(hinhAnh));
    }
  </script>
</body>

</html>