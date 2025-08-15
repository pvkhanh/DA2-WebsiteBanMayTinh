<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f4f4f4;
    }

    .checkout-container {
        max-width: 960px;
        margin: 40px auto;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 30px 0;
    }

    th,
    td {
        vertical-align: top;
    }

    th {
        text-align: left;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        font-weight: bold;
        margin-bottom: 8px;
    }

    .payment-method-content {
        display: none;
        margin-top: 20px;
    }

    .payment-option {
        width: 48%;
    }

    .payment-option img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .qr-info {
        display: none;
        padding: 15px;
        background-color: #f4f4f4;
        border-radius: 5px;
        text-align: center;
        width: 100%;
        margin-top: 20px;
    }

    .qr-info img {
        max-width: 200px;
    }

    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }

    .btn-primary:hover {
        background-color: #45a049;
        border-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="checkout-container">
        <h1 class="text-center mb-4">Thanh Toán</h1>
        <form action="thanhtoan.php" method="POST">
            <table>
                <tr>
                    <th>1. Địa chỉ thanh toán</th>
                    <th>2. Phương thức giao hàng</th>
                    <th>3. Phương thức thanh toán</th>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="name">Họ tên:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Nhập địa chỉ" required>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipping" id="free-shipping" value="free"
                                required>
                            <label class="form-check-label" for="free-shipping">Miễn phí giao hàng</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipping" id="express-shipping"
                                value="express" required>
                            <label class="form-check-label" for="express-shipping">Giao hàng nhanh</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="cash" value="cash" required>
                            <label class="form-check-label" for="cash">Tiền mặt</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="momo" value="momo" required>
                            <label class="form-check-label" for="momo">QR Momo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="bank" value="bank" required>
                            <label class="form-check-label" for="bank">Ngân hàng</label>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="qr-info" id="qr-info">
                <div id="payment-info">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Hoàn tất thanh toán</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const paymentRadios = document.querySelectorAll('input[name="payment"]');
    const qrInfo = document.getElementById('qr-info');
    const paymentInfo = document.getElementById('payment-info');

    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            qrInfo.style.display = 'none';
            paymentInfo.innerHTML = '';

            if (document.getElementById('momo').checked) {
                qrInfo.style.display = 'block';
                paymentInfo.innerHTML = `
                        <p><strong>QR Momo:</strong></p>
                        <img src="Images/qrmomo.jpg" alt="QR Momo">
                        <p>Sử dụng ứng dụng Momo để quét QR và thanh toán.</p>
                    `;
            } else if (document.getElementById('cash').checked) {
                qrInfo.style.display = 'block';
                paymentInfo.innerHTML =
                    '<p><strong>Thanh toán bằng tiền mặt khi nhận hàng.</strong></p>';
            } else if (document.getElementById('bank').checked) {
                qrInfo.style.display = 'block';
                paymentInfo.innerHTML = `
                        <p><strong>Thông tin Ngân Hàng:</strong></p>
                        <p>Số tài khoản: 3522200363333</p>
                        <p>Chủ tài khoản: PHAN VAN KHANH </p>
                        <p>Ngân hàng: AGRIBANK</p>
                    `;
            }
        });
    });
    </script>
</body>

</html>