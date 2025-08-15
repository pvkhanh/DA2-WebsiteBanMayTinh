-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 01:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanlaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `id_sp` int(11) DEFAULT NULL,
  `id_donhang` int(11) DEFAULT NULL,
  `so_luong_ban` int(11) DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_chitietdonhang`, `id_sp`, `id_donhang`, `so_luong_ban`, `don_gia`) VALUES
(1, 1, 44, 1, 11990000.00),
(2, 67, 45, 1, 3990000.00),
(3, 3, 46, 2, 19990000.00),
(4, 67, 46, 3, 3990000.00),
(5, 3, 47, 2, 19990000.00),
(6, 67, 47, 3, 3990000.00),
(7, 3, 48, 2, 19990000.00),
(8, 67, 48, 3, 3990000.00),
(9, 3, 49, 2, 19990000.00),
(10, 67, 49, 3, 3990000.00),
(11, 3, 50, 2, 19990000.00),
(12, 67, 50, 3, 3990000.00),
(13, 3, 51, 2, 19990000.00),
(14, 67, 51, 3, 3990000.00),
(15, 3, 52, 2, 19990000.00),
(16, 67, 52, 3, 3990000.00),
(17, 5, 53, 1, 16990000.00),
(18, 5, 54, 1, 16990000.00),
(19, 1, 54, 1, 11990000.00),
(20, 3, 55, 3, 19990000.00),
(21, 67, 55, 3, 3990000.00),
(22, 48, 55, 1, 32990000.00);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `ten_danh_muc` varchar(100) DEFAULT NULL,
  `nha_san_xuat` varchar(100) DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `ten_danh_muc`, `nha_san_xuat`, `mo_ta`) VALUES
(1, 'Laptop Acer', 'Acer', 'Các dòng máy tính xách tay của hãng Acer, phù hợp cho học tập, văn phòng và giải trí'),
(2, 'Laptop Asus', 'Asus', 'Dòng laptop chuyên nghiệp và gaming của Asus với nhiều dòng sản phẩm đa dạng'),
(3, 'Laptop Dell', 'Dell', 'Laptop Dell chất lượng cao, phù hợp cho doanh nghiệp và cá nhân'),
(4, 'Laptop HP', 'HP', 'Dòng laptop đa năng, hiệu năng tốt cho nhiều đối tượng người dùng'),
(5, 'Laptop Lenovo', 'Lenovo', 'Laptop Lenovo với thiết kế bền bỉ và hiệu năng ổn định'),
(6, 'Laptop MSI', 'MSI', 'Chuyên về laptop gaming và đồ họa chuyên nghiệp'),
(7, 'Laptop Apple', 'Apple', 'Dòng MacBook cao cấp với hiệu năng vượt trội'),
(8, 'Laptop Razer', 'Razer', 'Laptop chơi game cao cấp với thiết kế sang trọng'),
(9, 'Laptop Samsung', 'Samsung', 'Laptop mỏng nhẹ với thiết kế hiện đại'),
(10, 'Laptop Gigabyte', 'Gigabyte', 'Laptop gaming và đồ họa chuyên nghiệp'),
(11, 'SSD Samsung', 'Samsung', 'Ổ cứng SSD chất lượng cao của Samsung, tốc độ đọc ghi nhanh'),
(12, 'SSD Western Digital', 'Western Digital', 'Ổ cứng SSD tin cậy từ Western Digital, hiệu suất ổn định'),
(13, 'SSD Crucial', 'Crucial', 'Ổ cứng SSD Crucial với giá trị tốt và hiệu năng mạnh'),
(14, 'SSD Kingston', 'Kingston', 'Ổ cứng SSD Kingston chuyên nghiệp, độ bền cao'),
(15, 'HDD Seagate', 'Seagate', 'Ổ cứng HDD dung lượng lớn từ Seagate, phù hợp lưu trữ dữ liệu'),
(16, 'RAM Corsair', 'Corsair', 'Bộ nhớ RAM Corsair chuyên game, hiệu năng cao'),
(17, 'RAM G.Skill', 'G.Skill', 'RAM chất lượng cao của G.Skill, phù hợp cho đa nhiệm'),
(18, 'RAM Crucial', 'Crucial', 'RAM Crucial với độ ổn định và tương thích rộng'),
(19, 'RAM Kingston', 'Kingston', 'RAM Kingston chuyên nghiệp, hiệu suất mạnh'),
(20, 'RAM Samsung', 'Samsung', 'RAM Samsung với công nghệ tiên tiến, độ bền cao'),
(21, 'Pin Laptop Dell', 'Dell', 'Pin gốc cho laptop Dell, chất lượng chính hãng'),
(22, 'Pin Laptop HP', 'HP', 'Pin laptop HP, độ bền và thời lượng sử dụng tốt'),
(23, 'Pin Laptop Asus', 'Asus', 'Pin Asus với công nghệ pin tiên tiến'),
(24, 'Pin Laptop Lenovo', 'Lenovo', 'Pin Lenovo chính hãng, hiệu suất ổn định'),
(25, 'Pin Laptop Apple', 'Apple', 'Pin MacBook chất lượng cao, tuổi thọ pin dài'),
(26, 'Sạc Laptop Dell', 'Dell', 'Sạc laptop Dell chính hãng, an toàn và hiệu quả'),
(27, 'Sạc Laptop HP', 'HP', 'Sạc laptop HP, thiết kế gọn nhẹ và sạc nhanh'),
(28, 'Sạc Laptop Asus', 'Asus', 'Sạc laptop Asus với công nghệ sạc tiên tiến'),
(29, 'Sạc Laptop Lenovo', 'Lenovo', 'Sạc laptop Lenovo, tương thích và an toàn'),
(30, 'Sạc Laptop Apple', 'Apple', 'Sạc MacBook chính hãng, sạc nhanh và hiệu quả'),
(31, 'Bàn phím Logitech', 'Logitech', 'Bàn phím Logitech chất lượng cao, phù hợp làm việc và chơi game'),
(32, 'Bàn phím Razer', 'Razer', 'Bàn phím cơ Razer chuyên game, đèn nền RGB'),
(33, 'Bàn phím Corsair', 'Corsair', 'Bàn phím cơ Corsair, thiết kế chuyên nghiệp'),
(34, 'Bàn phím Microsoft', 'Microsoft', 'Bàn phím Microsoft, thoải mái và chính xác'),
(35, 'Bàn phím Keychron', 'Keychron', 'Bàn phím cơ Keychron, thiết kế đẹp và chất lượng'),
(36, 'Chuột Logitech', 'Logitech', 'Chuột Logitech chất lượng cao, phù hợp làm việc và chơi game'),
(37, 'Chuột Razer', 'Razer', 'Chuột gaming Razer với độ chính xác cao, đèn nền RGB'),
(38, 'Chuột Corsair', 'Corsair', 'Chuột chơi game Corsair, thiết kế chuyên nghiệp'),
(39, 'Chuột Microsoft', 'Microsoft', 'Chuột Microsoft, thoải mái và chính xác'),
(40, 'Chuột Glorious', 'Glorious', 'Chuột gaming Glorious, nhẹ và hiệu năng cao');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ngay_tao` datetime DEFAULT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_user`, `ngay_tao`, `tong_tien`, `trang_thai`) VALUES
(44, 1, '2024-11-29 18:25:12', 11990000.00, 'Huỷ'),
(45, 1, '2024-11-29 18:28:37', 3990000.00, 'Huỷ'),
(46, 1, '2024-11-30 02:18:45', 51950000.00, 'Chờ xử lý'),
(47, 1, '2024-11-30 02:21:11', 51950000.00, 'Đang giao hàng'),
(48, 1, '2024-11-30 02:21:32', 51950000.00, 'Huỷ'),
(49, 1, '2024-11-30 02:21:55', 51950000.00, 'Đang giao hàng'),
(50, 1, '2024-11-30 02:22:42', 51950000.00, 'Hoàn thành'),
(51, 1, '2024-11-30 02:23:14', 51950000.00, 'Đang giao hàng'),
(52, 1, '2024-11-30 03:07:08', 51950000.00, 'Hoàn thành'),
(53, 6, '2024-11-30 03:09:33', 16990000.00, 'Chờ xử lý'),
(54, 6, '2024-11-30 03:10:12', 28980000.00, 'Chờ xử lý'),
(55, 1, '2024-11-30 03:11:21', 99999999.99, 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_sp` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `don_gia` float DEFAULT NULL,
  `ngay_them` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id_giohang`, `id_user`, `id_sp`, `so_luong`, `don_gia`, `ngay_them`) VALUES
(2, 1, 3, 3, 19990000, '2024-11-30 02:10:31'),
(4, 2, 2, 1, 13990000, '2024-11-30 02:11:27'),
(5, 1, 67, 3, 3990000, '2024-11-30 02:14:20'),
(6, 6, 5, 1, 16990000, '2024-11-30 03:09:28'),
(7, 6, 1, 1, 11990000, '2024-11-30 03:09:56'),
(8, 1, 48, 1, 32990000, '2024-11-30 03:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image`) VALUES
(4, ' HP Ra Mắt Laptop ENVY X360 2024: Thiết Kế Mỏng Nhẹ và Thời Lượng Pin Lâu', 'HP vừa giới thiệu chiếc laptop ENVY X360 2024 với thiết kế mỏng nhẹ và khả năng xoay 360 độ. Được trang bị bộ vi xử lý Intel Core i7 thế hệ thứ 13 và GPU Intel Iris Xe, ENVY X360 mang lại hiệu suất mạnh mẽ cho công việc văn phòng, thiết kế đồ họa và giải trí. Một trong những điểm nổi bật của chiếc laptop này là thời lượng pin lên đến 16 giờ, giúp người dùng làm việc và học tập cả ngày mà không phải lo lắng về việc sạc lại.\r\n\r\nHy vọng các tin tức này giúp bạn có thêm thông tin thú vị về các dòng laptop hiện nay!', '2024-11-29 15:28:02', 'hp-envy-13.jpg'),
(5, 'Lenovo ThinkPad X1 Carbon Gen 11: Laptop Doanh Nhân Siêu Bền, Mỏng Nhẹ 1', 'Lenovo vừa ra mắt dòng laptop ThinkPad X1 Carbon Gen 11, tiếp tục kế thừa những đặc điểm nổi bật của dòng ThinkPad truyền thống với thiết kế mỏng nhẹ, bền bỉ và hiệu suất mạnh mẽ. Sản phẩm mới này được trang bị bộ vi xử lý Intel Core i7 thế hệ thứ 13 và có màn hình 14 inch độ phân giải 4K, mang lại hình ảnh sắc nét và sống động. Đặc biệt, ThinkPad X1 Carbon Gen 11 được chứng nhận MIL-STD 810H, đảm bảo khả năng chống chịu va đập và kháng nước, rất thích hợp cho các doanh nhân và người làm việc thường xuyên di chuyển.', '2024-11-29 15:32:38', 'dell-xps-17.jpg'),
(6, ' Dell XPS 13 Plus 2024: Sự Lột Xác Với Thiết Kế Mới Mẻ và Màn Hình InfinityEdge', 'Dell vừa giới thiệu mẫu laptop XPS 13 Plus 2024, với thiết kế hoàn toàn mới mẻ và hiện đại. Chiếc laptop này có viền màn hình InfinityEdge siêu mỏng và được trang bị bộ vi xử lý Intel Core i7 13th Gen. Với màn hình 13.4 inch OLED 4K, màu sắc chính xác và độ sáng cực kỳ cao, XPS 13 Plus là sự lựa chọn lý tưởng cho những ai cần một chiếc laptop nhẹ nhàng nhưng mạnh mẽ để làm việc hoặc giải trí. Ngoài ra, thời lượng pin của sản phẩm này lên đến 14 giờ, giúp người dùng làm việc xuyên suốt cả ngày.', '2024-11-29 15:32:56', 'dell-latitude-7420.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(200) DEFAULT NULL,
  `id_dm` int(11) DEFAULT NULL,
  `so_luong_ton` int(11) DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL,
  `mo_ta` varchar(500) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `id_dm`, `so_luong_ton`, `don_gia`, `mo_ta`, `hinh_anh`) VALUES
(1, 'Acer Aspire 5', 1, 50, 11990000.00, 'CPU: AMD Ryzen 5 5500U\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" Full HD\r\nCard đồ họa: AMD Radeon Graphics\r\nPin: 6 cell', 'acer-aspire-5.jpg'),
(2, 'Acer Swift 3', 1, 40, 13990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'acer-swift-3.jpg'),
(3, 'Acer Nitro 5', 1, 35, 19990000.00, 'CPU: Intel Core i7-11800H\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" 144Hz\r\nCard đồ họa: NVIDIA RTX 3050\r\nPin: 4 cell', 'acer-nitro-5.jpg'),
(4, 'Acer Predator Helios', 1, 25, 29990000.00, 'CPU: Intel Core i9-11900H\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 15.6\" 240Hz\r\nCard đồ họa: NVIDIA RTX 3070\r\nPin: 4 cell', 'acer-predator-helios.jpg'),
(5, 'Acer Spin 5', 1, 30, 16990000.00, 'CPU: Intel Core i7-1165G7\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 13.5\" 2K cảm ứng\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'acer-spin-5.jpg'),
(6, 'Acer TravelMate P6', 1, 20, 22990000.00, 'CPU: Intel Core i7-1165G7\r\nRAM: 16GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'acer-travelmate-p6.jpg'),
(7, 'Acer ConceptD 7', 1, 15, 39990000.00, 'CPU: Intel Xeon W-10885M\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 15.6\" 4K\r\nCard đồ họa: NVIDIA Quadro RTX 5000\r\nPin: 4 cell', 'acer-swift-3.jpg'),
(8, 'Acer Chromebook Spin', 1, 40, 8990000.00, 'CPU: Intel Celeron N4500\r\nRAM: 8GB DDR4\r\nỔ cứng: 128GB eMMC\r\nMàn hình: 11.6\" Cảm ứng\r\nCard đồ họa: Intel UHD\r\nPin: 4 cell', 'acer-chromebook-spin.jpg'),
(11, 'Asus VivoBook', 2, 50, 12990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 3 cell', 'asus-vivobook.jpg'),
(12, 'Asus TUF Gaming', 2, 40, 19990000.00, 'CPU: AMD Ryzen 7 5800H\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" 144Hz\r\nCard đồ họa: NVIDIA RTX 3050\r\nPin: 4 cell', 'asus-tuf-gaming.jpg'),
(13, 'Asus ROG Zephyrus', 2, 30, 29990000.00, 'CPU: Intel Core i9-11900H\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 15.6\" 240Hz\r\nCard đồ họa: NVIDIA RTX 3070\r\nPin: 4 cell', 'asus-rog-zephyrus.jpg'),
(16, 'Asus Chromebook', 2, 15, 8990000.00, 'CPU: Intel Celeron N4020\r\nRAM: 4GB DDR4\r\nỔ cứng: 64GB eMMC\r\nMàn hình: 11.6\" Cảm ứng\r\nCard đồ họa: Intel UHD\r\nPin: 2 cell', 'asus-chromebook.jpg'),
(17, 'Asus ProArt Studiobook', 2, 10, 39990000.00, 'CPU: AMD Ryzen 9 5900HX\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 16\" 4K\r\nCard đồ họa: NVIDIA RTX 3070\r\nPin: 6 cell', 'asus-proart.jpg'),
(18, 'Asus VivoBook S', 2, 30, 14990000.00, 'CPU: Intel Core i3-1115G4\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel UHD\r\nPin: 3 cell', 'asus-vivobook-s.jpg'),
(19, 'Asus ROG Strix', 2, 20, 25990000.00, 'CPU: AMD Ryzen 7 6800H\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" 165Hz\r\nCard đồ họa: NVIDIA RTX 3060\r\nPin: 4 cell', 'asus-rog-strix.jpg'),
(20, 'Asus Flip', 2, 25, 17990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 14\" Cảm ứng\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'asus-flip.jpg'),
(21, 'Dell Inspiron 15', 3, 50, 12990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 3 cell', 'dell-inspiron-15.jpg'),
(22, 'Dell XPS 13', 3, 40, 29990000.00, 'CPU: Intel Core i7-1185G7\r\nRAM: 16GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 13.4\" UHD+\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'dell-xps-13.jpg'),
(23, 'Dell Vostro 3400', 3, 30, 15990000.00, 'CPU: Intel Core i3-1115G4\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel UHD Graphics\r\nPin: 3 cell', 'dell-vostro-3400.jpg'),
(24, 'Dell Latitude 7420', 3, 20, 35990000.00, 'CPU: Intel Core i7-1165G7\r\nRAM: 16GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'dell-latitude-7420.jpg'),
(25, 'Dell G15 Gaming', 3, 35, 24990000.00, 'CPU: AMD Ryzen 7 5800H\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" 120Hz\r\nCard đồ họa: NVIDIA RTX 3060\r\nPin: 4 cell', 'dell-g15-gaming.jpg'),
(26, 'Dell Alienware m15', 3, 15, 49990000.00, 'CPU: Intel Core i9-11980HK\r\nRAM: 32GB DDR4\r\nỔ cứng: 2TB SSD\r\nMàn hình: 15.6\" 360Hz\r\nCard đồ họa: NVIDIA RTX 3080\r\nPin: 6 cell', 'dell-alienware-m15.jpg'),
(27, 'Dell XPS 17', 3, 25, 42990000.00, 'CPU: Intel Core i9-11900H\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 17\" UHD+\r\nCard đồ họa: NVIDIA RTX 3060\r\nPin: 6 cell', 'dell-xps-17.jpg'),
(28, 'Dell G3 15', 3, 30, 17990000.00, 'CPU: Intel Core i5-10300H\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 15.6\" 120Hz\r\nCard đồ họa: NVIDIA GTX 1650\r\nPin: 4 cell', 'dell-g3-15.jpg'),
(29, 'HP Omen 15', 4, 35, 24990000.00, 'CPU: AMD Ryzen 7 5800H\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" 144Hz\r\nCard đồ họa: NVIDIA RTX 3060\r\nPin: 4 cell', 'hp-omen-15.jpg'),
(30, 'HP Envy 13', 4, 20, 18990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 13.3\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 3 cell', 'hp-envy-13.jpg'),
(31, 'HP ProBook 450 G8', 4, 25, 17990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 3 cell', 'hp-probook-450-g8.jpg'),
(32, 'HP ZBook Studio G8', 4, 15, 52990000.00, 'CPU: Intel Xeon W-11955M\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 15.6\" UHD+\r\nCard đồ họa: NVIDIA RTX A2000\r\nPin: 6 cell', 'hp-zbook-studio-g8.jpg'),
(33, 'HP EliteBook 840 G8', 4, 30, 24990000.00, 'CPU: Intel Core i7-1165G7\r\nRAM: 16GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'hp-elitebook-840-g8.jpg'),
(34, 'HP Chromebook 14', 4, 40, 8990000.00, 'CPU: Intel Celeron N4020\r\nRAM: 4GB DDR4\r\nỔ cứng: 64GB eMMC\r\nMàn hình: 14\" Full HD\r\nCard đồ họa: Intel UHD\r\nPin: 3 cell', 'hp-chromebook-14.jpg'),
(35, 'HP Victus 16', 4, 20, 21990000.00, 'CPU: AMD Ryzen 5 5600H\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 16.1\" 144Hz\r\nCard đồ họa: NVIDIA RTX 3050\r\nPin: 4 cell', 'hp-victus-16.jpg'),
(36, 'HP Pavilion x360', 4, 30, 16990000.00, 'CPU: Intel Core i3-1125G4\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 14\" Full HD cảm ứng\r\nCard đồ họa: Intel UHD\r\nPin: 3 cell', 'hp-pavilion-x360.jpg'),
(47, 'MacBook Air M1', 7, 50, 24990000.00, 'CPU: Apple M1\r\nRAM: 8GB Unified Memory\r\nỔ cứng: 256GB SSD\r\nMàn hình: 13.3\" Retina\r\nCard đồ họa: Apple Integrated GPU\r\nPin: 4 cell', 'macbook-air-m1.jpg'),
(48, 'MacBook Pro M1 13', 7, 40, 32990000.00, 'CPU: Apple M1\r\nRAM: 16GB Unified Memory\r\nỔ cứng: 512GB SSD\r\nMàn hình: 13.3\" Retina\r\nCard đồ họa: Apple Integrated GPU\r\nPin: 4 cell', 'macbook-pro-m1-13.jpg'),
(49, 'MacBook Pro M2 14', 7, 30, 49990000.00, 'CPU: Apple M2 Pro\r\nRAM: 16GB Unified Memory\r\nỔ cứng: 512GB SSD\r\nMàn hình: 14.2\" Liquid Retina XDR\r\nCard đồ họa: Apple Integrated GPU\r\nPin: 4 cell', 'macbook-pro-m2-14.jpg'),
(50, 'MacBook Pro M2 16', 7, 20, 61990000.00, 'CPU: Apple M2 Max\r\nRAM: 32GB Unified Memory\r\nỔ cứng: 1TB SSD\r\nMàn hình: 16.2\" Liquid Retina XDR\r\nCard đồ họa: Apple Integrated GPU\r\nPin: 4 cell', 'macbook-pro-m2-16.jpg'),
(51, 'MacBook Air M2', 7, 35, 29990000.00, 'CPU: Apple M2\r\nRAM: 8GB Unified Memory\r\nỔ cứng: 256GB SSD\r\nMàn hình: 13.6\" Liquid Retina\r\nCard đồ họa: Apple Integrated GPU\r\nPin: 4 cell', 'macbook-air-m2.jpg'),
(52, 'MacBook Pro 13 M2', 7, 25, 34990000.00, 'CPU: Apple M2\r\nRAM: 16GB Unified Memory\r\nỔ cứng: 512GB SSD\r\nMàn hình: 13.3\" Retina\r\nCard đồ họa: Apple Integrated GPU\r\nPin: 4 cell', 'macbook-pro-13-m2.jpg'),
(53, 'MacBook Pro 15 Intel', 7, 15, 49990000.00, 'CPU: Intel Core i9\r\nRAM: 32GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 15.4\" Retina\r\nCard đồ họa: AMD Radeon Pro 560X\r\nPin: 4 cell', 'macbook-pro-15-intel.jpg'),
(54, 'MacBook Air Intel', 7, 40, 21990000.00, 'CPU: Intel Core i5\r\nRAM: 8GB DDR3\r\nỔ cứng: 128GB SSD\r\nMàn hình: 13.3\" Retina\r\nCard đồ họa: Intel UHD Graphics 617\r\nPin: 4 cell', 'macbook-air-intel.jpg'),
(57, 'Samsung Galaxy Book2 Pro', 9, 50, 29990000.00, 'CPU: Intel Core i7-1260P\r\nRAM: 16GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 13.3\" AMOLED\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'samsung-galaxy-book2-pro.jpg'),
(58, 'Samsung Galaxy Book Flex', 9, 40, 23990000.00, 'CPU: Intel Core i5-1135G7\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 13.3\" QLED cảm ứng\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'samsung-galaxy-book-flex.jpg'),
(59, 'Samsung Notebook 9 Pro', 9, 30, 25990000.00, 'CPU: Intel Core i7-8565U\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 13.3\" Full HD cảm ứng\r\nCard đồ họa: Intel UHD Graphics 620\r\nPin: 3 cell', 'samsung-notebook-9-pro.jpg'),
(60, 'Samsung Galaxy Book Ion', 9, 25, 19990000.00, 'CPU: Intel Core i5-10210U\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" QLED\r\nCard đồ họa: Intel UHD Graphics\r\nPin: 4 cell', 'samsung-galaxy-book-ion.jpg'),
(61, 'Samsung Galaxy Chromebook', 9, 20, 17990000.00, 'CPU: Intel Core i5-10210U\r\nRAM: 8GB DDR4\r\nỔ cứng: 256GB SSD\r\nMàn hình: 13.3\" UHD cảm ứng\r\nCard đồ họa: Intel UHD Graphics\r\nPin: 4 cell', 'samsung-galaxy-chromebook.jpg'),
(62, 'Samsung Galaxy Book Odyssey', 9, 15, 34990000.00, 'CPU: Intel Core i7-11600H\r\nRAM: 16GB DDR4\r\nỔ cứng: 1TB SSD\r\nMàn hình: 15.6\" Full HD\r\nCard đồ họa: NVIDIA RTX 3050 Ti\r\nPin: 4 cell', 'samsung-galaxy-book-odyssey.jpg'),
(63, 'Samsung Chromebook 4+', 9, 40, 8990000.00, 'CPU: Intel Celeron N4000\r\nRAM: 4GB DDR4\r\nỔ cứng: 64GB eMMC\r\nMàn hình: 15.6\" Full HD\r\nCard đồ họa: Intel UHD Graphics 600\r\nPin: 2 cell', 'samsung-chromebook-4+.jpg'),
(64, 'Samsung Galaxy Book2', 9, 25, 21990000.00, 'CPU: Intel Core i5-1240P\r\nRAM: 8GB DDR4\r\nỔ cứng: 512GB SSD\r\nMàn hình: 15.6\" AMOLED\r\nCard đồ họa: Intel Iris Xe\r\nPin: 4 cell', 'samsung-galaxy-book2.jpg'),
(66, 'Samsung 870 EVO 500GB', 11, 100, 1290000.00, 'Dung lượng: 500GB, Chuẩn: SATA III, Tốc độ đọc: 560MB/s, Tốc độ ghi: 530MB/s', 'samsung-870-evo.jpg'),
(67, 'Samsung 980 PRO 1TB', 11, 50, 3990000.00, 'Dung lượng: 1TB, Chuẩn: PCIe 4.0 NVMe, Tốc độ đọc: 7000MB/s, Tốc độ ghi: 5100MB/s', 'samsung-980-pro.jpg'),
(68, 'Samsung T7 Portable 1TB', 11, 70, 2890000.00, 'Dung lượng: 1TB, Loại: SSD di động, Tốc độ truyền: 1050MB/s, Chống sốc', 'samsung-t7.jpg'),
(69, 'Samsung 860 QVO 1TB', 11, 80, 1990000.00, 'Dung lượng: 1TB, Chuẩn: SATA III, Tốc độ đọc: 550MB/s, Tốc độ ghi: 520MB/s', 'samsung-860-qvo.jpg'),
(70, 'Samsung 970 EVO Plus 500GB', 11, 90, 1790000.00, 'Dung lượng: 500GB, Chuẩn: PCIe NVMe, Tốc độ đọc: 3500MB/s, Tốc độ ghi: 3300MB/s', 'samsung-970-evo-plus.jpg'),
(71, 'WD Blue SN570 500GB', 12, 120, 1390000.00, 'Dung lượng: 500GB, Chuẩn: PCIe NVMe, Tốc độ đọc: 3500MB/s, Tốc độ ghi: 2300MB/s', 'wd-blue-sn570.jpg'),
(72, 'WD Black SN850 1TB', 12, 60, 4890000.00, 'Dung lượng: 1TB, Chuẩn: PCIe 4.0 NVMe, Tốc độ đọc: 7000MB/s, Tốc độ ghi: 5300MB/s', 'wd-black-sn850.jpg'),
(73, 'WD Green SSD 240GB', 12, 150, 790000.00, 'Dung lượng: 240GB, Chuẩn: SATA III, Tốc độ đọc: 545MB/s, Tốc độ ghi: 465MB/s', 'wd-green-240gb.jpg'),
(74, 'WD My Passport SSD 1TB', 12, 50, 2790000.00, 'Dung lượng: 1TB, Loại: SSD di động, Tốc độ truyền: 1050MB/s, Bảo vệ bằng mật khẩu', 'wd-my-passport.jpg'),
(75, 'WD Red SSD 1TB', 12, 40, 3190000.00, 'Dung lượng: 1TB, Chuẩn: SATA III, Tốc độ đọc: 560MB/s, Tốc độ ghi: 530MB/s', 'wd-red-1tb.jpg'),
(76, 'Corsair Vengeance RGB Pro 16GB', 16, 70, 1790000.00, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Đèn RGB', 'corsair-vengeance-rgb-pro.jpg'),
(77, 'Corsair Dominator Platinum 16GB', 16, 50, 3290000.00, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3600MHz, Thiết kế cao cấp', 'corsair-dominator-platinum.jpg'),
(78, 'Corsair ValueSelect 8GB', 16, 100, 790000.00, 'Dung lượng: 8GB, Loại: DDR4, Bus: 2400MHz, Giá rẻ', 'corsair-valueselect.jpg'),
(79, 'Corsair Vengeance LPX 32GB', 16, 40, 3090000.00, 'Dung lượng: 32GB (2x16GB), Loại: DDR4, Bus: 3000MHz, Tản nhiệt thấp', 'corsair-vengeance-lpx.jpg'),
(80, 'Corsair XMS3 4GB', 16, 200, 490000.00, 'Dung lượng: 4GB, Loại: DDR3, Bus: 1600MHz, Đáng tin cậy', 'corsair-xms3.jpg'),
(81, 'G.Skill Trident Z RGB 16GB', 17, 60, 1990000.00, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Đèn RGB', 'gskill-trident-z.jpg'),
(82, 'G.Skill Ripjaws V 16GB', 17, 80, 1790000.00, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Tản nhiệt tốt', 'gskill-ripjaws-v.jpg'),
(83, 'G.Skill Aegis 8GB', 17, 120, 790000.00, 'Dung lượng: 8GB, Loại: DDR4, Bus: 3000MHz, Hiệu năng cao', 'gskill-aegis.jpg'),
(84, 'G.Skill Sniper X 32GB', 17, 30, 3090000.00, 'Dung lượng: 32GB (2x16GB), Loại: DDR4, Bus: 3400MHz, Thiết kế phong cách', 'gskill-sniper-x.jpg'),
(85, 'G.Skill Flare X 16GB', 17, 50, 1990000.00, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Tối ưu cho AMD Ryzen', 'gskill-flare-x.jpg'),
(86, 'Pin Laptop Dell 45Wh', 21, 50, 1290000.00, 'Dung lượng: 45Wh, Tương thích: Dell Inspiron, Hiệu suất ổn định', 'pin-dell-45wh.jpg'),
(87, 'Pin Laptop Dell 65Wh', 21, 30, 1590000.00, 'Dung lượng: 65Wh, Tương thích: Dell Latitude, Độ bền cao', 'pin-dell-65wh.jpg'),
(88, 'Pin Laptop Dell 90Wh', 21, 20, 1990000.00, 'Dung lượng: 90Wh, Tương thích: Dell Precision, Hiệu năng tốt', 'pin-dell-90wh.jpg'),
(89, 'Pin Laptop Dell XPS 56Wh', 21, 25, 1890000.00, 'Dung lượng: 56Wh, Tương thích: Dell XPS, Sạc nhanh', 'pin-dell-xps.jpg'),
(90, 'Pin Laptop Dell Vostro 42Wh', 21, 40, 1290000.00, 'Dung lượng: 42Wh, Tương thích: Dell Vostro, Giá hợp lý', 'pin-dell-vostro.jpg'),
(91, 'Pin Laptop HP 41Wh', 22, 60, 1190000.00, 'Dung lượng: 41Wh, Tương thích: HP Pavilion, Độ bền cao', 'pin-hp-41wh.jpg'),
(92, 'Pin Laptop HP 55Wh', 22, 40, 1490000.00, 'Dung lượng: 55Wh, Tương thích: HP Envy, Sạc nhanh', 'pin-hp-55wh.jpg'),
(93, 'Pin Laptop HP 75Wh', 22, 25, 1990000.00, 'Dung lượng: 75Wh, Tương thích: HP Spectre, Hiệu suất tốt', 'pin-hp-75wh.jpg'),
(94, 'Pin Laptop HP ProBook 44Wh', 22, 30, 1390000.00, 'Dung lượng: 44Wh, Tương thích: HP ProBook, Chất lượng chính hãng', 'pin-hp-probook.jpg'),
(95, 'Pin Laptop HP EliteBook 52Wh', 22, 35, 1790000.00, 'Dung lượng: 52Wh, Tương thích: HP EliteBook, Sử dụng lâu dài', 'pin-hp-elitebook.jpg'),
(96, 'Logitech K120', 31, 120, 290000.00, 'Loại: Có dây, Kết nối: USB, Phù hợp văn phòng', 'logitech-k120.jpg'),
(97, 'Logitech G213 Prodigy', 31, 60, 1290000.00, 'Loại: Có dây, Đèn LED RGB, Phím giả cơ', 'logitech-g213.jpg'),
(98, 'Logitech MX Keys', 31, 40, 2290000.00, 'Loại: Không dây, Kết nối: Bluetooth, Thiết kế cao cấp', 'logitech-mx-keys.jpg'),
(99, 'Logitech G PRO X', 31, 30, 2990000.00, 'Loại: Có dây, Phím cơ, Đèn RGB', 'logitech-g-pro-x.jpg'),
(100, 'Logitech K380', 31, 100, 890000.00, 'Loại: Không dây, Kết nối: Bluetooth, Nhỏ gọn', 'logitech-k380.jpg'),
(101, 'Logitech M331 Silent', 36, 150, 390000.00, 'Loại: Không dây, Độ phân giải: 1000DPI, Chống ồn', 'logitech-m331.jpg'),
(102, 'Logitech G502 HERO', 36, 60, 1290000.00, 'Loại: Có dây, Độ phân giải: 16000DPI, Đèn RGB', 'logitech-g502.jpg'),
(103, 'Logitech MX Master 3', 36, 50, 2290000.00, 'Loại: Không dây, Độ phân giải: 4000DPI, Thiết kế công thái học', 'logitech-mx-master-3.jpg'),
(104, 'Logitech G304 Lightspeed', 36, 80, 990000.00, 'Loại: Không dây, Độ phân giải: 12000DPI, Tăng tốc', 'logitech-g304.jpg'),
(105, 'Logitech M720 Triathlon', 36, 70, 890000.00, 'Loại: Không dây, Đa thiết bị, Pin lâu', 'logitech-m720.jpg'),
(106, 'Sạc Laptop Dell 65W', 26, 80, 990000.00, 'Công suất: 65W, Tương thích: Dell Inspiron, Bảo vệ quá tải', 'sac-dell-65w.jpg'),
(107, 'Sạc Laptop Dell 90W', 26, 50, 1290000.00, 'Công suất: 90W, Tương thích: Dell XPS, Sạc nhanh', 'sac-dell-90w.jpg'),
(108, 'Sạc Laptop Dell 130W', 26, 30, 1590000.00, 'Công suất: 130W, Tương thích: Dell Alienware, Hiệu năng cao', 'sac-dell-130w.jpg'),
(109, 'Sạc Laptop Dell 45W', 26, 70, 890000.00, 'Công suất: 45W, Tương thích: Dell Latitude, Gọn nhẹ', 'sac-dell-45w.jpg'),
(110, 'Sạc Laptop Dell 180W', 26, 20, 1990000.00, 'Công suất: 180W, Tương thích: Dell Precision, Hiệu quả cao', 'sac-dell-180w.jpg'),
(111, 'Sạc Laptop HP 65W', 27, 100, 950000.00, 'Công suất: 65W, Tương thích: HP Pavilion, Chất lượng chính hãng', 'sac-hp-65w.jpg'),
(112, 'Sạc Laptop HP 90W', 27, 60, 1190000.00, 'Công suất: 90W, Tương thích: HP Envy, Sạc nhanh', 'sac-hp-90w.jpg'),
(113, 'Sạc Laptop HP 120W', 27, 40, 1490000.00, 'Công suất: 120W, Tương thích: HP Spectre, An toàn', 'sac-hp-120w.jpg'),
(114, 'Sạc Laptop HP 45W', 27, 80, 850000.00, 'Công suất: 45W, Tương thích: HP ProBook, Nhẹ và di động', 'sac-hp-45w.jpg'),
(115, 'Sạc Laptop HP 150W', 27, 20, 1790000.00, 'Công suất: 150W, Tương thích: HP ZBook, Hiệu suất mạnh', 'sac-hp-150w.jpg'),
(116, 'SSD Kingston A400 240GB', 14, 100, 890000.00, 'Dung lượng: 240GB, Tốc độ đọc: 500MB/s, Tốc độ ghi: 350MB/s, Loại: SATA III', 'ssd-kingston-a400-240gb.jpg'),
(117, 'SSD Kingston NV1 500GB', 14, 80, 1290000.00, 'Dung lượng: 500GB, Tốc độ đọc: 2100MB/s, Tốc độ ghi: 1700MB/s, Loại: NVMe PCIe Gen 3', 'ssd-kingston-nv1-500gb.jpg'),
(118, 'SSD Kingston KC3000 1TB', 14, 50, 2990000.00, 'Dung lượng: 1TB, Tốc độ đọc: 7000MB/s, Tốc độ ghi: 6000MB/s, Loại: NVMe PCIe Gen 4', 'ssd-kingston-kc3000-1tb.jpg'),
(119, 'SSD Kingston Fury Renegade 2TB', 14, 30, 5490000.00, 'Dung lượng: 2TB, Tốc độ đọc: 7300MB/s, Tốc độ ghi: 7000MB/s, Loại: NVMe PCIe Gen 4', 'ssd-kingston-renegade-2tb.jpg'),
(120, 'SSD Kingston Data Center 960GB', 14, 25, 4290000.00, 'Dung lượng: 960GB, Tốc độ đọc: 560MB/s, Tốc độ ghi: 520MB/s, Loại: SATA III, Phù hợp cho doanh nghiệp', 'ssd-kingston-datacenter-960gb.jpg'),
(121, 'RAM Kingston DDR4 8GB 2666MHz', 19, 150, 790000.00, 'Dung lượng: 8GB, Loại: DDR4, Tốc độ: 2666MHz, 1.2V', 'ram-kingston-ddr4-8gb-2666mhz.jpg'),
(122, 'RAM Kingston DDR4 16GB 3200MHz', 19, 100, 1490000.00, 'Dung lượng: 16GB, Loại: DDR4, Tốc độ: 3200MHz, XMP 2.0', 'ram-kingston-ddr4-16gb-3200mhz.jpg'),
(123, 'RAM Kingston Fury Beast RGB 16GB', 19, 80, 1790000.00, 'Dung lượng: 16GB, Loại: DDR4, Tốc độ: 3600MHz, Đèn RGB', 'ram-kingston-fury-beast-16gb.jpg'),
(124, 'RAM Kingston Fury Impact 32GB', 19, 40, 3990000.00, 'Dung lượng: 32GB, Loại: DDR5, Tốc độ: 4800MHz, Dùng cho laptop', 'ram-kingston-fury-impact-32gb.jpg'),
(125, 'RAM Kingston Server Premier 32GB', 19, 30, 5990000.00, 'Dung lượng: 32GB, Loại: DDR4 ECC, Tốc độ: 3200MHz, Dùng cho máy chủ', 'ram-kingston-server-premier-32gb.jpg'),
(126, 'RAM Samsung DDR4 8GB 2400MHz', 20, 120, 750000.00, 'Dung lượng: 8GB, Loại: DDR4, Tốc độ: 2400MHz, 1.2V', 'ram-samsung-ddr4-8gb-2400mhz.jpg'),
(127, 'RAM Samsung DDR4 16GB 3200MHz', 20, 90, 1350000.00, 'Dung lượng: 16GB, Loại: DDR4, Tốc độ: 3200MHz, Dùng cho laptop', 'ram-samsung-ddr4-16gb-3200mhz.jpg'),
(128, 'RAM Samsung DDR5 16GB 4800MHz', 20, 50, 1990000.00, 'Dung lượng: 16GB, Loại: DDR5, Tốc độ: 4800MHz, Hiệu suất cao', 'ram-samsung-ddr5-16gb-4800mhz.jpg'),
(129, 'RAM Samsung DDR5 32GB 5200MHz', 20, 30, 3990000.00, 'Dung lượng: 32GB, Loại: DDR5, Tốc độ: 5200MHz, Dùng cho máy trạm', 'ram-samsung-ddr5-32gb-5200mhz.jpg'),
(130, 'RAM Samsung Server ECC 64GB 3200MHz', 20, 20, 7890000.00, 'Dung lượng: 64GB, Loại: DDR4 ECC, Tốc độ: 3200MHz, Dùng cho máy chủ', 'ram-samsung-server-ecc-64gb.jpg'),
(131, 'Pin MacBook Pro 13\"', 25, 40, 2490000.00, 'Dung lượng: 58Wh, Tương thích: MacBook Pro 13\" 2018-2020, Chính hãng Apple', 'pin-macbook-pro-13.jpg'),
(132, 'Pin MacBook Air 13\"', 25, 50, 1990000.00, 'Dung lượng: 50Wh, Tương thích: MacBook Air 13\" 2017-2020, Chính hãng Apple', 'pin-macbook-air-13.jpg'),
(133, 'Pin Asus X507', 23, 70, 890000.00, 'Dung lượng: 33Wh, Tương thích: Asus X507, Sạc nhanh', 'pin-asus-x507.jpg'),
(134, 'Pin Asus VivoBook 14\"', 23, 40, 1190000.00, 'Dung lượng: 42Wh, Tương thích: VivoBook 14\", Hiệu suất tốt', 'pin-asus-vivobook-14.jpg'),
(135, 'Pin Lenovo ThinkPad T490', 24, 35, 1590000.00, 'Dung lượng: 48Wh, Tương thích: ThinkPad T490, Chính hãng Lenovo', 'pin-thinkpad-t490.jpg'),
(136, 'Pin Lenovo IdeaPad 3', 24, 50, 990000.00, 'Dung lượng: 35Wh, Tương thích: IdeaPad 3, Giá hợp lý', 'pin-lenovo-ideapad-3.jpg'),
(137, 'Sạc MacBook 30W USB-C', 30, 60, 1290000.00, 'Công suất: 30W, Tương thích: MacBook Air, Cổng: USB-C', 'sac-macbook-30w.jpg'),
(138, 'Sạc MacBook 61W USB-C', 30, 40, 1790000.00, 'Công suất: 61W, Tương thích: MacBook Pro 13\", Cổng: USB-C', 'sac-macbook-61w.jpg'),
(139, 'Sạc Asus 65W', 28, 70, 890000.00, 'Công suất: 65W, Tương thích: Asus VivoBook, Hiệu suất cao', 'sac-asus-65w.jpg'),
(140, 'Sạc Asus 90W', 28, 50, 1290000.00, 'Công suất: 90W, Tương thích: Asus ZenBook, Chính hãng Asus', 'sac-asus-90w.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gioi_tinh` varchar(10) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `dien_thoai` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `quyen` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `password`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `dien_thoai`, `email`, `quyen`) VALUES
(1, 'Nguyen Van A', 'nguyenvana', 'password123', 'Nam', '1990-01-01', '123 Đường ABC, TP. HCM', '0123456789', 'nguyenvana@example.com', 1),
(2, 'Tran Thi B', 'tranthib', 'password456', 'Nữ', '1992-02-02', '456 Đường XYZ, TP. Hà Nội', '0987654321', 'tranthib@example.com', 1),
(3, 'Le Van C', 'levanc', 'password789', 'Nam', '1994-03-03', '789 Đường LMN, TP. Đà Nẵng', '0345678901', 'levanc@example.com', 1),
(4, 'Pham Thi D', 'phamthid', 'password321', 'Nữ', '1996-04-04', '321 Đường OPQ, TP. Hải Phòng', '0567890123', 'phamthid@example.com', 1),
(5, 'Do Van E', 'dovane', 'password654', 'Nam', '1998-05-05', '987 Đường RST, TP. Cần Thơ', '0789012345', 'dovane@example.com', 1),
(6, 'Phan Văn Khánh', 'pvkhanh', 'admin12345', 'Nam', '2003-04-09', 'Thanh Hoá', '0866183903', 'phangiap349@gmail.com', 0),
(17, 'Nguyễn Trọng Bắc', 'ntbac', 'admin12345', 'Nam', '2003-12-11', 'Hà Nội', '012234556', 'ntbac@gmail.com', 0),
(19, 'Hà Gia Kiệt', 'hgkiet', 'admin12345', 'Nam', '2003-02-21', 'Phú Thọ', '049343821', 'hgkiet@gmail.com', 0),
(20, 'Lê Thị Thu Huyền', 'ltthuyen', 'admin12345', 'Nữ', '2003-06-06', 'Nam Định', '0293239282', 'ltthuuyen@gmail.com', 0),
(23, 'Nguyễn Thị D', 'ntd', '123', 'Nữ', '2024-11-27', 'Phú Thọ', '0293239282', 'ntd@gmail.com', 1),
(24, 'Nông Thị A', 'nta', '$2y$10$9HrjQjv7BJ/.v64PlVWSNOy1IfezqySeXfusnTDvj0ghmAnUoA.Wq', 'Khác', '2024-11-19', 'a', '0915732454', 'nta@cloud.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdonhang`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_kh` (`id_user`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `id_kh` (`id_user`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_danhmuc` (`id_dm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
