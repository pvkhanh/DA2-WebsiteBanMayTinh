
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKKH | Gaming Gear & Phụ kiện chính hãng</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/banner.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/menuNgang.css">
    <link rel="stylesheet" href="Styles/danhsachlaptop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-box button {
            right: -49px;
            top: 1px;
        }

        .main-container .banner-123 {
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            width: 100%;
        }
        .product-site product-laptop{
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <?php include 'header1.php'; ?>

    <?php include 'menuNgang.php'; ?>


    <div class="main-container">
        <div class="banner-123">
            <?php
            include 'banner.php';
            ?>
        </div>
    </div>
    <div class="product-site product-laptop">
        <?php
        include 'DanhsachLaptop.php';
        ?>
    </div>
    <div class="product-site product-laptop">
        <?php
        include 'DStintuc.php';
        ?>
    </div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>

</html>