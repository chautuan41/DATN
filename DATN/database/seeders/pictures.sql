-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2022 lúc 08:06 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pictures`
--

INSERT INTO `pictures` (`id`, `link`, `product`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'images/shop/product/picture/SL221101M-1.jpg', 1, 1, '2022-07-13 04:26:09', '2022-07-13 04:26:09', NULL),
(2, 'images/shop/product/picture/SL221101M-2.jpg', 1, 1, '2022-07-13 04:26:09', '2022-07-13 04:26:09', NULL),
(3, 'images/shop/product/picture/SL221101M-3.jpg', 1, 1, '2022-07-13 04:26:09', '2022-07-13 04:26:09', NULL),
(4, 'images/shop/product/picture/SL221101W-1.JPG', 5, 1, '2022-07-13 04:30:32', '2022-07-13 04:30:32', NULL),
(5, 'images/shop/product/picture/SL221101W-2.JPG', 5, 1, '2022-07-13 04:30:32', '2022-07-13 04:30:32', NULL),
(6, 'images/shop/product/picture/SL221101W-3.JPG', 5, 1, '2022-07-13 04:30:32', '2022-07-13 04:30:32', NULL),
(7, 'images/shop/product/picture/SL221201M-1.JPG', 8, 1, '2022-07-13 04:31:01', '2022-07-13 04:31:01', NULL),
(8, 'images/shop/product/picture/SL221201M-2.JPG', 8, 1, '2022-07-13 04:31:01', '2022-07-13 04:31:01', NULL),
(9, 'images/shop/product/picture/SL221301M-1.JPG', 12, 1, '2022-07-13 04:33:41', '2022-07-13 04:33:41', NULL),
(10, 'images/shop/product/picture/SL221301M-2.JPG', 12, 1, '2022-07-13 04:33:41', '2022-07-13 04:33:41', NULL),
(11, 'images/shop/product/picture/SL221301M-3.JPG', 12, 1, '2022-07-13 04:33:41', '2022-07-13 04:33:41', NULL),
(12, 'images/shop/product/picture/SL221301W-1.JPG', 15, 1, '2022-07-13 04:35:19', '2022-07-13 04:35:19', NULL),
(13, 'images/shop/product/picture/SL221301W-2.JPG', 15, 1, '2022-07-13 04:35:19', '2022-07-13 04:35:19', NULL),
(14, 'images/shop/product/picture/SL221301W-3.JPG', 15, 1, '2022-07-13 04:35:19', '2022-07-13 04:35:19', NULL),
(15, 'images/shop/product/picture/SL221401M-1.JPG', 21, 1, '2022-07-13 04:37:02', '2022-07-13 04:37:02', NULL),
(16, 'images/shop/product/picture/SL221401M-2.JPG', 21, 1, '2022-07-13 04:37:02', '2022-07-13 04:37:02', NULL),
(17, 'images/shop/product/picture/SL221401W-1.JPG', 24, 1, '2022-07-13 04:37:37', '2022-07-13 04:37:37', NULL),
(18, 'images/shop/product/picture/SL221401W-2.JPG', 24, 1, '2022-07-13 04:37:37', '2022-07-13 04:37:37', NULL),
(19, 'images/shop/product/picture/SL221401W-3.JPG', 24, 1, '2022-07-13 04:37:37', '2022-07-13 04:37:37', NULL),
(20, 'images/shop/product/picture/SL221402W-1.JPG', 30, 1, '2022-07-13 04:38:07', '2022-07-13 04:38:07', NULL),
(21, 'images/shop/product/picture/SL221402W-2.JPG', 30, 1, '2022-07-13 04:38:07', '2022-07-13 04:38:07', NULL),
(22, 'images/shop/product/picture/SL221402W-3.JPG', 30, 1, '2022-07-13 04:38:07', '2022-07-13 04:38:07', NULL),
(23, 'images/shop/product/picture/SL221501W-1.JPG', 34, 1, '2022-07-13 04:38:38', '2022-07-13 04:38:38', NULL),
(24, 'images/shop/product/picture/SL221501W-2.JPG', 34, 1, '2022-07-13 04:38:38', '2022-07-13 04:38:38', NULL),
(25, 'images/shop/product/picture/SL221501W-3.JPG', 34, 1, '2022-07-13 04:38:38', '2022-07-13 04:38:38', NULL),
(26, 'images/shop/product/picture/SL221502W-1.jpg', 35, 1, '2022-07-13 04:42:40', '2022-07-13 04:42:40', NULL),
(27, 'images/shop/product/picture/SL221502W-2.jpg', 35, 1, '2022-07-13 04:42:40', '2022-07-13 04:42:40', NULL),
(28, 'images/shop/product/picture/SL221502W-3.jpg', 35, 1, '2022-07-13 04:42:40', '2022-07-13 04:42:40', NULL),
(29, 'images/shop/product/picture/FG221101M-1.JPG', 3, 1, '2022-07-13 04:43:37', '2022-07-13 04:43:37', NULL),
(30, 'images/shop/product/picture/FG221101M-2.JPG', 3, 1, '2022-07-13 04:43:37', '2022-07-13 04:43:37', NULL),
(31, 'images/shop/product/picture/FG221301M-1.JPG', 11, 1, '2022-07-13 04:44:10', '2022-07-13 04:44:10', NULL),
(32, 'images/shop/product/picture/FG221301M-2.JPG', 11, 1, '2022-07-13 04:44:10', '2022-07-13 04:44:10', NULL),
(33, 'images/shop/product/picture/FG221301M-3.JPG', 11, 1, '2022-07-13 04:44:10', '2022-07-13 04:44:10', NULL),
(34, 'images/shop/product/picture/FG221302M-1.JPG', 17, 1, '2022-07-13 04:44:36', '2022-07-13 04:44:36', NULL),
(35, 'images/shop/product/picture/FG221302M-2.JPG', 17, 1, '2022-07-13 04:44:36', '2022-07-13 04:44:36', NULL),
(36, 'images/shop/product/picture/FG221302M-3.JPG', 17, 1, '2022-07-13 04:44:36', '2022-07-13 04:44:36', NULL),
(37, 'images/shop/product/picture/FG221401M-1.JPG', 22, 1, '2022-07-13 04:45:52', '2022-07-13 04:45:52', NULL),
(38, 'images/shop/product/picture/FG221401M-2.JPG', 22, 1, '2022-07-13 04:45:52', '2022-07-13 04:45:52', NULL),
(39, 'images/shop/product/picture/FG221401M-3.JPG', 22, 1, '2022-07-13 04:45:52', '2022-07-13 04:45:52', NULL),
(40, 'images/shop/product/picture/FG221402M-1.JPG', 27, 1, '2022-07-13 04:46:20', '2022-07-13 04:46:20', NULL),
(41, 'images/shop/product/picture/FG221402M-2.JPG', 27, 1, '2022-07-13 04:46:20', '2022-07-13 04:46:20', NULL),
(42, 'images/shop/product/picture/FG221403M-1.JPG', 28, 1, '2022-07-13 04:46:41', '2022-07-13 04:46:41', NULL),
(43, 'images/shop/product/picture/FG221403M-2.JPG', 28, 1, '2022-07-13 04:46:41', '2022-07-13 04:46:41', NULL),
(44, 'images/shop/product/picture/FG221403M-3.JPG', 28, 1, '2022-07-13 04:46:41', '2022-07-13 04:46:41', NULL),
(45, 'images/shop/product/picture/FG221501M-1.JPG', 31, 1, '2022-07-13 04:47:13', '2022-07-13 04:47:13', NULL),
(46, 'images/shop/product/picture/FG221501M-2.JPG', 31, 1, '2022-07-13 04:47:13', '2022-07-13 04:47:13', NULL),
(47, 'images/shop/product/picture/VS221101M-1.JPG', 2, 1, '2022-07-13 04:52:22', '2022-07-13 04:52:22', NULL),
(48, 'images/shop/product/picture/VS221101M-2.JPG', 2, 1, '2022-07-13 04:52:22', '2022-07-13 04:52:22', NULL),
(49, 'images/shop/product/picture/VS221101M-3.JPG', 2, 1, '2022-07-13 04:52:22', '2022-07-13 04:52:22', NULL),
(50, 'images/shop/product/picture/VS221101W-1.jpg', 4, 1, '2022-07-13 04:54:11', '2022-07-13 04:54:11', NULL),
(51, 'images/shop/product/picture/VS221101W-2.JPG', 4, 1, '2022-07-13 04:54:11', '2022-07-13 04:54:11', NULL),
(52, 'images/shop/product/picture/VS221101W-3.JPG', 4, 1, '2022-07-13 04:54:11', '2022-07-13 04:54:11', NULL),
(53, 'images/shop/product/picture/VS221102M-1.JPG', 7, 1, '2022-07-13 04:56:16', '2022-07-13 04:56:16', NULL),
(54, 'images/shop/product/picture/VS221102M-2.JPG', 7, 1, '2022-07-13 04:56:16', '2022-07-13 04:56:16', NULL),
(55, 'images/shop/product/picture/VS221102M-3.JPG', 7, 1, '2022-07-13 04:56:16', '2022-07-13 04:56:16', NULL),
(56, 'images/shop/product/picture/VS221201M-1.jpg', 10, 1, '2022-07-13 04:58:00', '2022-07-13 04:58:00', NULL),
(57, 'images/shop/product/picture/VS221201M-2.jpg', 10, 1, '2022-07-13 04:58:00', '2022-07-13 04:58:00', NULL),
(58, 'images/shop/product/picture/VS221201M-3.jpg', 10, 1, '2022-07-13 04:58:00', '2022-07-13 04:58:00', NULL),
(59, 'images/shop/product/picture/VS221301W-1.JPG', 14, 1, '2022-07-13 04:58:26', '2022-07-13 04:58:26', NULL),
(60, 'images/shop/product/picture/VS221301W-2.JPG', 14, 1, '2022-07-13 04:58:26', '2022-07-13 04:58:26', NULL),
(61, 'images/shop/product/picture/VS221301W-3.JPG', 14, 1, '2022-07-13 04:58:26', '2022-07-13 04:58:26', NULL),
(62, 'images/shop/product/picture/VS221302W-1.JPG', 19, 1, '2022-07-13 04:59:19', '2022-07-13 04:59:19', NULL),
(63, 'images/shop/product/picture/VS221302W-2.JPG', 19, 1, '2022-07-13 04:59:19', '2022-07-13 04:59:19', NULL),
(64, 'images/shop/product/picture/VS221302W-3.JPG', 19, 1, '2022-07-13 04:59:19', '2022-07-13 04:59:19', NULL),
(65, 'images/shop/product/picture/VS223901M-1.jpg', 42, 1, '2022-07-13 05:01:45', '2022-07-13 05:01:45', NULL),
(66, 'images/shop/product/picture/BB221101M-1.JPG', 6, 1, '2022-07-13 05:03:11', '2022-07-13 05:03:11', NULL),
(67, 'images/shop/product/picture/BB221101M-2.JPG', 6, 1, '2022-07-13 05:03:11', '2022-07-13 05:03:11', NULL),
(68, 'images/shop/product/picture/BB221101M-3.JPG', 6, 1, '2022-07-13 05:03:11', '2022-07-13 05:03:11', NULL),
(69, 'images/shop/product/picture/BB221301M-1.JPG', 16, 1, '2022-07-13 05:03:49', '2022-07-13 05:03:49', NULL),
(70, 'images/shop/product/picture/BB221301M-2.JPG', 16, 1, '2022-07-13 05:03:49', '2022-07-13 05:03:49', NULL),
(71, 'images/shop/product/picture/BB221401M-1.JPG', 23, 1, '2022-07-13 05:04:10', '2022-07-13 05:04:10', NULL),
(72, 'images/shop/product/picture/BB221401M-2.JPG', 23, 1, '2022-07-13 05:04:10', '2022-07-13 05:04:10', NULL),
(73, 'images/shop/product/picture/BB221401M-1.jpg', 23, 1, '2022-07-13 05:09:07', '2022-07-13 05:09:07', NULL),
(74, 'images/shop/product/picture/BB221401M-2.jpg', 23, 1, '2022-07-13 05:09:07', '2022-07-13 05:09:07', NULL),
(75, 'images/shop/product/picture/BB221401M-3.jpg', 23, 1, '2022-07-13 05:09:07', '2022-07-13 05:09:07', NULL),
(76, 'images/shop/product/picture/BB221401M-4.jpg', 23, 1, '2022-07-13 05:09:07', '2022-07-13 05:09:07', NULL),
(77, 'images/shop/product/picture/BB221401W-1.JPG', 25, 1, '2022-07-13 05:09:27', '2022-07-13 05:09:27', NULL),
(78, 'images/shop/product/picture/BB221401W-2.JPG', 25, 1, '2022-07-13 05:09:27', '2022-07-13 05:09:27', NULL),
(79, 'images/shop/product/picture/BB221401W-3.JPG', 25, 1, '2022-07-13 05:09:27', '2022-07-13 05:09:27', NULL),
(80, 'images/shop/product/picture/BB221402M-1.JPG', 26, 1, '2022-07-13 05:09:45', '2022-07-13 05:09:45', NULL),
(81, 'images/shop/product/picture/BB221402M-2.JPG', 26, 1, '2022-07-13 05:09:45', '2022-07-13 05:09:45', NULL),
(82, 'images/shop/product/picture/BB221402W-1.JPG', 29, 1, '2022-07-13 05:10:16', '2022-07-13 05:10:16', NULL),
(83, 'images/shop/product/picture/BB221402W-2.JPG', 29, 1, '2022-07-13 05:10:16', '2022-07-13 05:10:16', NULL),
(84, 'images/shop/product/picture/BB221402W-3.JPG', 29, 1, '2022-07-13 05:10:16', '2022-07-13 05:10:16', NULL),
(85, 'images/shop/product/picture/RL221201M-1.jpg', 9, 1, '2022-07-13 05:11:29', '2022-07-13 05:11:29', NULL),
(86, 'images/shop/product/picture/RL221201M-2.jpg', 9, 1, '2022-07-13 05:11:29', '2022-07-13 05:11:29', NULL),
(87, 'images/shop/product/picture/RL221301M-1.JPG', 13, 1, '2022-07-13 05:11:48', '2022-07-13 05:11:48', NULL),
(88, 'images/shop/product/picture/RL221301M-2.JPG', 13, 1, '2022-07-13 05:11:48', '2022-07-13 05:11:48', NULL),
(89, 'images/shop/product/picture/RL221301M-3.JPG', 13, 1, '2022-07-13 05:11:48', '2022-07-13 05:11:48', NULL),
(90, 'images/shop/product/picture/AD221301M-1.JPG', 18, 1, '2022-07-13 05:12:13', '2022-07-13 05:12:13', NULL),
(91, 'images/shop/product/picture/AD221301M-2.JPG', 18, 1, '2022-07-13 05:12:13', '2022-07-13 05:12:13', NULL),
(92, 'images/shop/product/picture/AD221301M-3.JPG', 18, 1, '2022-07-13 05:12:13', '2022-07-13 05:12:13', NULL),
(93, 'images/shop/product/picture/AD221301M-4.JPG', 18, 1, '2022-07-13 05:12:13', '2022-07-13 05:12:13', NULL),
(94, 'images/shop/product/picture/AD221301W-1.jpg', 20, 1, '2022-07-13 05:13:24', '2022-07-13 05:13:24', NULL),
(95, 'images/shop/product/picture/AD221301W-2.jpg', 20, 1, '2022-07-13 05:13:24', '2022-07-13 05:13:24', NULL),
(96, 'images/shop/product/picture/AD221301W-3.jpg', 20, 1, '2022-07-13 05:13:24', '2022-07-13 05:13:24', NULL),
(97, 'images/shop/product/picture/BA221501M-1.JPG', 32, 1, '2022-07-13 05:14:16', '2022-07-13 05:14:16', NULL),
(98, 'images/shop/product/picture/BA221501M-2.JPG', 32, 1, '2022-07-13 05:14:16', '2022-07-13 05:14:16', NULL),
(99, 'images/shop/product/picture/BA221501M-3.JPG', 32, 1, '2022-07-13 05:14:16', '2022-07-13 05:14:16', NULL),
(100, 'images/shop/product/picture/BA221502M-1.JPG', 33, 1, '2022-07-13 05:14:32', '2022-07-13 05:14:32', NULL),
(101, 'images/shop/product/picture/BA221502M-2.JPG', 33, 1, '2022-07-13 05:14:32', '2022-07-13 05:14:32', NULL),
(102, 'images/shop/product/picture/BA221502M-3.JPG', 33, 1, '2022-07-13 05:14:32', '2022-07-13 05:14:32', NULL),
(103, 'images/shop/product/picture/RO222601W-1.jpg', 36, 1, '2022-07-13 05:15:17', '2022-07-13 05:15:17', NULL),
(104, 'images/shop/product/picture/RO222601W-2.jpg', 36, 1, '2022-07-13 05:15:17', '2022-07-13 05:15:17', NULL),
(105, 'images/shop/product/picture/RO222601M-1.jpg', 38, 1, '2022-07-13 05:15:31', '2022-07-13 05:15:31', NULL),
(106, 'images/shop/product/picture/RO222601M-2.jpg', 38, 1, '2022-07-13 05:15:31', '2022-07-13 05:15:31', NULL),
(107, 'images/shop/product/picture/RO222601M-3.jpg', 38, 1, '2022-07-13 05:15:31', '2022-07-13 05:15:31', NULL),
(108, 'images/shop/product/picture/CA222601W-1.jpg', 37, 1, '2022-07-13 05:15:50', '2022-07-13 05:15:50', NULL),
(109, 'images/shop/product/picture/CA222601W-2.jpg', 37, 1, '2022-07-13 05:15:50', '2022-07-13 05:15:50', NULL),
(110, 'images/shop/product/picture/CA222601W-3.jpg', 37, 1, '2022-07-13 05:15:50', '2022-07-13 05:15:50', NULL),
(111, 'images/shop/product/picture/AP222701M-1.jpg', 39, 1, '2022-07-13 05:16:09', '2022-07-13 05:16:09', NULL),
(112, 'images/shop/product/picture/AP222701M-2.jpg', 39, 1, '2022-07-13 05:16:09', '2022-07-13 05:16:09', NULL),
(113, 'images/shop/product/picture/AP222701M-3.jpg', 39, 1, '2022-07-13 05:16:09', '2022-07-13 05:16:09', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_product_foreign` (`product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_product_foreign` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
