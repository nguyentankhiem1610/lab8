-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2026 at 06:49 PM
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
-- Database: `db_hanghoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id`, `ten`) VALUES
(3, 'Điện thoại'),
(4, 'Laptop'),
(5, 'Phụ kiện'),
(6, 'Máy tính bảng'),
(7, 'Đồng hồ thông minh'),
(8, 'Màn hình'),
(9, 'Bàn phím'),
(10, 'Chuột'),
(11, 'Loa'),
(12, 'Thiết bị mạng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `mota` mediumtext DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `id_dm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `ten`, `mota`, `gia`, `id_dm`) VALUES
(7, 'Tai nghe AirPods Pro', 'Tai nghe không dây Apple', 5500000, 3),
(8, 'Chuột Logitech MX Master 3', 'Chuột văn phòng cao cấp', 2500000, 3),
(9, 'Bàn phím cơ Razer', 'Bàn phím gaming RGB', 3000000, 3),
(10, 'iPad Pro 12.9', 'Máy tính bảng cao cấp', 28000000, 4),
(11, 'Samsung Galaxy Tab S9', 'Tablet Android mạnh mẽ', 20000000, 4),
(12, 'Apple Watch Series 9', 'Đồng hồ thông minh Apple', 12000000, 5),
(13, 'Samsung Galaxy Watch 6', 'Đồng hồ thông minh Samsung', 9000000, 5),
(57, 'iPhone 14', 'iPhone thế hệ trước', 20000000, 3),
(58, 'Oppo Find X6', 'Camera siêu nét', 18000000, 3),
(59, 'Vivo V29', 'Thiết kế mỏng nhẹ', 12000000, 3),
(60, 'Realme GT5', 'Gaming giá rẻ', 11000000, 3),
(61, 'HP Pavilion 15', 'Laptop học tập văn phòng', 17000000, 4),
(62, 'Lenovo Legion 5', 'Laptop gaming RTX', 27000000, 4),
(63, 'Acer Aspire 7', 'Cấu hình tốt giá ổn', 19000000, 4),
(64, 'Sạc nhanh 65W', 'Củ sạc công suất cao', 600000, 5),
(65, 'Pin dự phòng 20000mAh', 'Dung lượng lớn', 800000, 5),
(66, 'Cáp Type-C', 'Cáp sạc nhanh', 150000, 5),
(67, 'iPad Air 5', 'Chip M1 mạnh mẽ', 19000000, 6),
(68, 'Xiaomi Pad 6', 'Tablet Android giá tốt', 11000000, 6),
(69, 'Huawei Watch GT4', 'Pin lâu 2 tuần', 7000000, 7),
(70, 'Amazfit GTR 4', 'Đồng hồ thể thao', 5000000, 7),
(71, 'LG UltraWide 29 inch', 'Màn hình 29 inch IPS', 6000000, 8),
(72, 'Samsung Odyssey G5', 'Màn hình gaming 144Hz', 7500000, 8),
(73, 'Dell UltraSharp 27 inch', 'Màn hình đồ họa', 9000000, 8),
(74, 'Keychron K8', 'Bàn phím cơ Bluetooth', 2500000, 9),
(75, 'Akko 3087', 'Bàn phím cơ RGB', 1800000, 9),
(76, 'Logitech K380', 'Bàn phím văn phòng', 700000, 9),
(77, 'Razer DeathAdder V3', 'Chuột gaming cao cấp', 2200000, 10),
(78, 'Logitech G102', 'Chuột gaming giá rẻ', 400000, 10),
(79, 'Dareu EM908', 'Chuột RGB', 350000, 10),
(80, 'JBL Charge 5', 'Loa Bluetooth chống nước', 3500000, 11),
(81, 'Sony SRS-XE200', 'Âm thanh mạnh mẽ', 2800000, 11),
(82, 'Harman Kardon Onyx 7', 'Loa cao cấp', 7000000, 11),
(83, 'Router TP-Link AX55', 'WiFi 6 tốc độ cao', 2500000, 12),
(84, 'Router Asus RT-AX53U', 'WiFi 6 mạnh mẽ', 3000000, 12),
(85, 'Bo kich song Xiaomi', 'Mo rong WiFi', 500000, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`,`ten`),
  ADD KEY `FK_SanPham_DanhMuc` (`id_dm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `FK_SanPham_DanhMuc` FOREIGN KEY (`id_dm`) REFERENCES `tbl_danhmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
