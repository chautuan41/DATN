-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2022 lúc 08:19 AM
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `gender` int(11) DEFAULT 1,
  `discount` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` int(10) UNSIGNED NOT NULL,
  `product_type` int(10) UNSIGNED NOT NULL,
  `supplier` int(10) UNSIGNED NOT NULL,
  `brand` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `product_name`, `description`, `price`, `amount`, `gender`, `discount`, `like`, `image`, `categories`, `product_type`, `supplier`, `brand`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SL221101M', 'Sport Vintage T-Shirt', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic \"Rive Gauche\" collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label\"s illustrious reputation by reintroducing cult styles, including the \"Lou\" handbag and \"Tribute\" sandals.', 550, 100, 1, 0, 0, 'images/shop/product/SL221101M.jpg', 1, 1, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:26:09', NULL),
(2, 'VS221101M', 'Cotton Jersey Monogram Logo Tee', 'Since 1978, Gianni Versaces iconic Italian label has been celebrated for its over-the-top glamour and sexiness. After Giannis tragicdeath in 1997, his sister Donatella took the creative reins, and while remaining consistent with Giannis design aesthetic, Donatella has brought a bold femininity and subtle polish to the beloved design house.', 375, 100, 1, 0, 0, 'images/shop/product/VS221101M.JPG', 1, 1, 11, 11, 1, '2022-07-13 04:22:28', '2022-07-13 14:35:51', NULL),
(3, 'FG221101M', 'Perfect Vintage Tee', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 195, 100, 1, 117, 0, 'images/shop/product/FG221101M.JPG', 1, 1, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 14:37:17', NULL),
(4, 'VS221101W', 'Logo T-Shirt', 'Since 1978, Gianni Versaces iconic Italian label has been celebrated for its over-the-top glamour and sexiness. After Gianni\"s tragic death in 1997, his sister Donatella took the creative reins, and while remaining consistent with Gianni\"s design aesthetic, Donatella has brought a bold femininity and subtle polish to the beloved design house.', 575, 100, 0, 0, 0, 'images/shop/product/VS221101W.jpg', 1, 1, 11, 11, 1, '2022-07-13 04:22:28', '2022-07-13 14:37:17', NULL),
(5, 'SL221101W', 'Boyfriend Fit Logo Crewneck Tee', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 450, 100, 0, 0, 0, 'images/shop/product/SL221101W.JPG', 1, 1, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 14:35:51', NULL),
(6, 'BB221101M', 'Walton Polo', 'Founded in 1856, Burberry’s legacy as a pillar of British style grew from Thomas Burberry’s most iconic innovation: the gabardine trench coat. Upholding the pioneering spirit of his predecessor, current creative director Riccardo Tisci brings a fresh and irreverent approach to the house’s quintessentially British vision of luxury. Marrying technology, artistry, and tradition, the label touts a range of casual-wear and eveningwear that embodies a progressive femininity. Exquisite shirting, knitwear, and draped jackets exude refinement, while menswear-inspired polos, tailored trousers, and ankle boots achieve an easy polish.', 490, 100, 1, 0, 0, 'images/shop/product/BB221101M.JPG', 1, 1, 4, 4, 1, '2022-07-13 04:22:28', '2022-07-13 05:03:11', NULL),
(7, 'VS221102M', 'Versace Polo', 'Since 1978, Gianni Versaces iconic Italian label has been celebrated for its over-the-top glamour and sexiness. After Giannis tragicdeath in 1997, his sister Donatella took the creative reins, and while remaining consistent with Giannis design aesthetic, Donatella has brought a bold femininity and subtle polish to the beloved design house.', 575, 100, 1, 0, 0, 'images/shop/product/VS221102M.JPG', 1, 1, 11, 11, 1, '2022-07-13 04:22:28', '2022-07-13 04:56:16', NULL),
(8, 'SL221201M', 'Classic Yves Shirt', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 550, 100, 1, 0, 0, 'images/shop/product/SL221201M.JPG', 1, 2, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:31:01', NULL),
(9, 'RL221201M', 'Oxford Shirt', 'description', 99, 100, 1, 0, 0, 'images/shop/product/RL221201M.jpg', 1, 2, 8, 8, 1, '2022-07-13 04:22:28', '2022-07-13 05:11:29', NULL),
(10, 'VS221201M', 'Short Sleeve Printed Shirt', 'Since 1978, Gianni Versaces iconic Italian label has been celebrated for its over-the-top glamour and sexiness. After Giannis tragicdeath in 1997, his sister Donatella took the creative reins, and while remaining consistent with Giannis design aesthetic, Donatella has brought a bold femininity and subtle polish to the beloved design house.', 1150, 100, 1, 0, 0, 'images/shop/product/VS221201M.jpg', 1, 2, 11, 11, 1, '2022-07-13 04:22:28', '2022-07-13 04:57:59', NULL),
(11, 'FG221301M', 'Slim Trouser', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 895, 100, 1, 537, 0, 'images/shop/product/FG221301M.JPG', 1, 3, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 04:44:10', NULL),
(12, 'SL221301M', 'Saint Laurent Pant', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 1550, 100, 1, 0, 0, 'images/shop/product/SL221301M.JPG', 1, 3, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:33:41', NULL),
(13, 'RL221301M', 'Fleece Pant Relaxed', 'ASDASD', 110, 100, 1, 0, 0, 'images/shop/product/RL221301M.JPG', 1, 3, 8, 8, 1, '2022-07-13 04:22:28', '2022-07-13 05:11:48', NULL),
(14, 'VS221301W', 'Gym Legging', 'Since 1978, Gianni Versaces iconic Italian label has been celebrated for its over-the-top glamour and sexiness. After Gianni\"s tragic death in 1997, his sister Donatella took the creative reins, and while remaining consistent with Gianni\"s design aesthetic, Donatella has brought a bold femininity and subtle polish to the beloved design house.', 275, 100, 0, 0, 0, 'images/shop/product/VS221301W.JPG', 1, 3, 11, 11, 1, '2022-07-13 04:22:28', '2022-07-13 04:58:26', NULL),
(15, 'SL221301W', 'Tailored Pants', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 1150, 100, 0, 0, 0, 'images/shop/product/SL221301W.JPG', 1, 3, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:35:19', NULL),
(16, 'BB221301M', 'Guildes Small Scale Check Swim Trunk', 'Founded in 1856, Burberry’s legacy as a pillar of British style grew from Thomas Burberry’s most iconic innovation: the gabardine trench coat. Upholding the pioneering spirit of his predecessor, current creative director Riccardo Tisci brings a fresh and irreverent approach to the house’s quintessentially British vision of luxury. Marrying technology, artistry, and tradition, the label touts a range of casual-wear and eveningwear that embodies a progressive femininity. Exquisite shirting, knitwear, and draped jackets exude refinement, while menswear-inspired polos, tailored trousers, and ankle boots achieve an easy polish.', 350, 100, 1, 0, 0, 'images/shop/product/BB221301M.JPG', 1, 3, 4, 4, 1, '2022-07-13 04:22:28', '2022-07-13 05:03:49', NULL),
(17, 'FG221302M', 'The Vintage Sweatshort', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 450, 100, 1, 270, 0, 'images/shop/product/FG221302M.JPG', 1, 3, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 04:44:36', NULL),
(18, 'AD221301M', 'Adidas Originals X Noah Short', 'ASDASD', 120, 100, 1, 0, 0, 'images/shop/product/AD221301M.JPG', 1, 3, 1, 1, 1, '2022-07-13 04:22:28', '2022-07-13 05:12:13', NULL),
(19, 'VS221302W', 'Coupe De Deaux Short', 'Since 1978, Gianni Versaces iconic Italian label has been celebrated for its over-the-top glamour and sexiness. After Gianni\"s tragic death in 1997, his sister Donatella took the creative reins, and while remaining consistent with Gianni\"s design aesthetic, Donatella has brought a bold femininity and subtle polish to the beloved design house.', 1175, 100, 0, 0, 0, 'images/shop/product/VS221302W.JPG', 1, 3, 11, 11, 1, '2022-07-13 04:22:28', '2022-07-13 04:59:19', NULL),
(20, 'AD221301W', 'True Pace Running Short', 'ASDASD', 95, 100, 0, 0, 0, 'images/shop/product/AD221301W.jpg', 1, 3, 1, 1, 1, '2022-07-13 04:22:28', '2022-07-13 05:13:24', NULL),
(21, 'SL221401M', 'Teddy College Varsity Jacket', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 2990, 100, 1, 0, 0, 'images/shop/product/SL221401M.jpg', 1, 4, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:37:02', NULL),
(22, 'FG221401M', 'Souvenir Jacket', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 1295, 100, 1, 544, 0, 'images/shop/product/FG221401M.JPG', 1, 4, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 04:45:52', NULL),
(23, 'BB221401M', 'Dainton Parka', 'Founded in 1856, Burberry’s legacy as a pillar of British style grew from Thomas Burberry’s most iconic innovation: the gabardine trench coat. Upholding the pioneering spirit of his predecessor, current creative director Riccardo Tisci brings a fresh and irreverent approach to the house’s quintessentially British vision of luxury. Marrying technology, artistry, and tradition, the label touts a range of casual-wear and eveningwear that embodies a progressive femininity. Exquisite shirting, knitwear, and draped jackets exude refinement, while menswear-inspired polos, tailored trousers, and ankle boots achieve an easy polish.', 1690, 100, 1, 845, 0, 'images/shop/product/BB221401M.jpg', 1, 4, 4, 4, 1, '2022-07-13 04:22:28', '2022-07-13 05:09:06', NULL),
(24, 'SL221401W', 'Teddy Raglan Bomber Jacket', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 2990, 100, 0, 0, 0, 'images/shop/product/SL221401W.JPG', 1, 4, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:37:37', NULL),
(25, 'BB221401W', 'Demmi Bomber', 'Founded in 1856, Burberry’s legacy as a pillar of British style grew from Thomas Burberry’s most iconic innovation: the gabardine trench coat. Upholding the pioneering spirit of his predecessor, current creative director Riccardo Tisci brings a fresh and irreverent approach to the house’s quintessentially British vision of luxury. Marrying technology, artistry, and tradition, the label touts a range of casual-wear and eveningwear that embodies a progressive femininity. Exquisite shirting, knitwear, and draped jackets exude refinement, while menswear-inspired polos, tailored trousers, and ankle boots achieve an easy polish.', 1290, 100, 0, 0, 0, 'images/shop/product/BB221401W.JPG', 1, 4, 4, 4, 1, '2022-07-13 04:22:28', '2022-07-13 05:09:27', NULL),
(26, 'BB221402M', 'Heritage Refresh Raglan Trench Coat', 'Founded in 1856, Burberry’s legacy as a pillar of British style grew from Thomas Burberry’s most iconic innovation: the gabardine trench coat. Upholding the pioneering spirit of his predecessor, current creative director Riccardo Tisci brings a fresh and irreverent approach to the house’s quintessentially British vision of luxury. Marrying technology, artistry, and tradition, the label touts a range of casual-wear and eveningwear that embodies a progressive femininity. Exquisite shirting, knitwear, and draped jackets exude refinement, while menswear-inspired polos, tailored trousers, and ankle boots achieve an easy polish.', 2190, 100, 1, 1424, 0, 'images/shop/product/BB221402M.JPG', 1, 4, 4, 4, 1, '2022-07-13 04:22:28', '2022-07-13 05:09:45', NULL),
(27, 'FG221402M', 'Car Coat', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 1450, 100, 1, 725, 0, 'images/shop/product/FG221402M.JPG', 1, 4, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 04:46:20', NULL),
(28, 'FG221403M', 'Camo Military Coat', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 995, 100, 1, 498, 0, 'images/shop/product/FG221403M.JPG', 1, 4, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 04:46:41', NULL),
(29, 'BB221402W', 'Kensington Rain Jacket', 'Founded in 1856, Burberry’s legacy as a pillar of British style grew from Thomas Burberry’s most iconic innovation: the gabardine trench coat. Upholding the pioneering spirit of his predecessor, current creative director Riccardo Tisci brings a fresh and irreverent approach to the house’s quintessentially British vision of luxury. Marrying technology, artistry, and tradition, the label touts a range of casual-wear and eveningwear that embodies a progressive femininity. Exquisite shirting, knitwear, and draped jackets exude refinement, while menswear-inspired polos, tailored trousers, and ankle boots achieve an easy polish.', 2490, 100, 0, 0, 0, 'images/shop/product/BB221402W.JPG', 1, 4, 4, 4, 1, '2022-07-13 04:22:28', '2022-07-13 05:10:16', NULL),
(30, 'SL221402W', 'Leopard Jacket', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 2550, 100, 0, 0, 0, 'images/shop/product/SL221402W.JPG', 1, 4, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:38:07', NULL),
(31, 'FG221501M', 'Denim Trucker Jacket', 'Born in the streets of Los Angeles, Fear of God is a label from Creative Director and Founder, Jerry Lorenzo. Influenced by Lorenzo’s spirituality and diverse past, the collection combines both high fashion and street with an attention to detail using the finest materials.', 895, 100, 1, 537, 0, 'images/shop/product/FG221501M.JPG', 1, 5, 7, 7, 1, '2022-07-13 04:22:28', '2022-07-13 04:47:12', NULL),
(32, 'BA221501M', 'Oversized Jacket', 'Creative director since 2015, Demna Gvasalia continues Balenciaga’s tradition of extreme experimentation, bringing his uniquely subversive vision to the storied French house. Merging the worlds of streetwear and high fashion, and blatantly disregarding industry conventions, Gvasalia reconfigures the label’s archival pieces with signature exaggerated silhouettes, asymmetric cuts, and acid colorways. Androgynous blazers, trench coats, and wool overcoats are cut in oversized shapes, while t-shirts, hoodies, and knitwear feature signature logo graphics.', 1573, 100, 1, 0, 0, 'images/shop/product/BA221501M.JPG', 1, 5, 3, 3, 1, '2022-07-13 04:22:28', '2022-07-13 05:14:15', NULL),
(33, 'BA221502M', 'Large Fit Paris Denim Jacker', 'Creative director since 2015, Demna Gvasalia continues Balenciaga’s tradition of extreme experimentation, bringing his uniquely subversive vision to the storied French house. Merging the worlds of streetwear and high fashion, and blatantly disregarding industry conventions, Gvasalia reconfigures the label’s archival pieces with signature exaggerated silhouettes, asymmetric cuts, and acid colorways. Androgynous blazers, trench coats, and wool overcoats are cut in oversized shapes, while t-shirts, hoodies, and knitwear feature signature logo graphics.', 1590, 100, 1, 0, 0, 'images/shop/product/BA221502M.JPG', 1, 5, 3, 3, 1, '2022-07-13 04:22:28', '2022-07-13 05:14:32', NULL),
(34, 'SL221501W', 'Sleeveless Denim Mini Dress', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 1090, 100, 0, 0, 0, 'images/shop/product/SL221501W.JPG', 1, 5, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:38:38', NULL),
(35, 'SL221502W', 'Denim Jacket', 'SAINT LAURENT has been influencing and revolutionizing the fashion industry since the debut of its iconic ‘Rive Gauche’ collection in 1966 - the couture house was the first to create a ready-to-wear capsule. The sleek, precisely tailored staples, like the signature biker jackets, transcend seasons and trends. Creative Director Anthony Vaccarello continues to honor the label’s illustrious reputation by reintroducing cult styles, including the ‘Lou’ handbag and ‘Tribute’ sandals.', 1090, 100, 0, 0, 0, 'images/shop/product/SL221502W.jpg', 1, 5, 10, 10, 1, '2022-07-13 04:22:28', '2022-07-13 04:42:40', NULL),
(36, 'RO222601W', 'Pearlmaster 34 Rose Gold Diamond Paved Watch', '18kt rose gold case with a 18kt rose gold pearlmaster with diamonds bracelet. Fixed diamond set diamond paved bezel. Rose gold pave dial with gold-tone hands and Roman numeral hour markers. Dial Type: Analog. Date display at the 3 o\"clock position. Rolex Calibre 2235 Automatic movement, containing 31 Jewels, bitting at 28800 vph, and has a power reserve of approximately 48 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape, case size: 34 mm, case thickness: 12 mm. Band width: 17 mm. Oyster clasp. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second, chronometer. Luxury watch style. Watch label: Swiss Made. Item Variations: 81405rbr. Rolex Pearlmaster 34 Rose Gold Diamond Paved Watch 81405 rbr-0001.', 167700, 5, 0, 140550, 0, 'images/shop/product/RO222601W.jpg', 2, 6, 9, 9, 1, '2022-07-13 04:22:28', '2022-07-13 05:15:17', NULL),
(37, 'CA222601W', 'Cartier Pasha Diamond Silver Watch', 'Rose gold-tone 18kt rose gold case and bracelet. Fixed rose gold-tone bezel with diamond set 18kt rose gold. Silver-tone dial with blued-steel sword-shaped hands and Arabic & index hour markers. Minute scale around the inner rim. Dial Type: Analog. Automatic movement. Scratch resistant sapphire crystal. Pull / push crown. Solid case back. Round case shape, case size: 42 mm, case thickness: 9 mm. Hidden clasp. Water resistant at 30 meters / 100 feet. Functions: hour, minute, second. Cartier Pasha Series. Luxury watch style. Watch label: Swiss Made. Pre-owned Cartier Cartier Pasha Automatic Diamond Silver Dial Ladies Watch 2770.', 35795, 5, 0, 0, 0, 'images/shop/product/CA222601W.jpg', 2, 6, 5, 5, 1, '2022-07-13 04:22:28', '2022-07-13 05:15:50', NULL),
(38, 'RO222601M', 'Cosmograph Daytona Eye Diamond Watch', '18kt rose gold case with a black rubber oysterflex strap. Fixed diamond set bezel. Yellow-tone dial with gold-tone hands and diamond hour markers. Dial Type: Analog. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Rolex Calibre 4130 automatic movement with a 72-hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape, case size: 40 mm, case thickness: 12.4 mm. Band width: 20 mm. Oysterlock clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, hour, minute, small second, chronometer. Additional Info: original box, international warranty card, manual (complete accessories). Luxury watch style. Watch label: Swiss Made. Rolex Cosmograph Daytona Eye of the Tiger Chronograph Automatic Chronometer Diamond Men\"s Watch 116588TBR-0003.', 400000, 5, 1, 0, 0, 'images/shop/product/RO222601M.jpg', 2, 6, 9, 9, 1, '2022-07-13 04:22:29', '2022-07-13 05:50:44', NULL),
(39, 'AP222701M', 'Royal Oak \"China Edition\" Watch', 'Grey titanium case and bracelet. Fixed silver-tone titanium bezel. Slate get dial with grey hands and index hour markers. Week number markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Perpetual calendar. Four sub-dials displaying: month/leap year, moonphase, date, day of the week. Audemars Piguet Calibre 5134 Automatic movement, based upon Audemars Piguet 2120, containing 38 Jewels, composed of 374 parts, bitting at 19800 vph, and has a power reserve of approximately 40 hours. Scratch resistant sapphire crystal. Screw down crown. Transparent see through case back. Round case shape, case size: 41 mm, case thickness: 9.5 mm. Deployment clasp. Water resistant at 20 meters / 66 feet. Functions: perpetual calendar, moon phase, week number, leap year, month, date, day, hour, minute. Additional Info: limited edition of 88. Royal Oak Perpetual Calendar Series. Sport watch style. Watch label: Swiss Made. Audemars Piguet Royal Oak \"China Edition\" Perpetual Calendar Automatic Men\"s Watch 26609TI.OO.1220TI.01.', 200000, 5, 1, 0, 0, 'images/shop/product/AP222701M.jpg', 2, 7, 2, 2, 1, '2022-07-13 04:22:29', '2022-07-13 05:16:09', NULL),
(40, 'CN223801M', 'Bleu De Chanel', 'An ode to masculine freedom expressed in an aromatic-woody fragrance with a captivating trail. A timeless scent housed in a bottle of deep and mysterious blue. BLEU DE CHANEL is presented here in an eau de parfum with an exquisitely pronounced scent that reveals a determined spirit.', 207, 100, 1, 155, 0, 'images/shop/product/CN223801M.jpg', 3, 8, 6, 6, 1, '2022-07-13 04:22:29', '2022-07-13 05:16:31', NULL),
(41, 'CN223801W', 'Coco Mademoiselle Intense', 'A more intense version of the Coco Mademoiselle fragrance. Deep, sweet, warm, sensual, refined & voluptuous. Top notes of Sicilian orange, Calabrian bergamot & lemon. Heart notes of rose, jasmine & fruits. Base notes of patchouli, tonka bean, vanilla, labdanum & white musk. Launched in 2018. Launch year: 2018. Top notes: Sicilian orange, Calabrian bergamot, Lemon. Heart notes: Rose, Jasmine, Fruits. Base notes: Patchouli, Tonka bean, Vanilla, Labdanum, White musk. Design house: Chanel. Scent name: Coco Mademoiselle. Gender: Ladies. Category: Perfume. SubType: EDP Spray. Size: 6.7 oz. Barcode: 3145891166705. Chanel - Coco Mademoiselle Intense Eau De Parfum Spray 200ml / 6.7oz.', 257, 100, 0, 0, 0, 'images/shop/product/CN223801W.jpg', 3, 8, 6, 6, 1, '2022-07-13 04:22:29', '2022-07-13 05:16:44', NULL),
(42, 'VS223901M', 'Versace Eros', 'Launch year: 2013. Top notes: Mint, Green apple, Lemon. Heart notes: Tonka bean, Geranium, Ambroxan. Base notes: Madagascar vanilla, Vetiver, Oakmoss, Virginian cedar, Altas cedar. Design house: Versace. Scent name: Versace Eros. Gender: Mens. Category: Perfume. Type: Fragrance. SubType: EDT Spray. Size: 6.7 oz. SKU: VREMTS67. Barcode: 8011003813858. Versace Eros / Versace EDT Spray 6.7 oz (200 ml) (m).', 122, 100, 1, 81, 0, 'images/shop/product/VS223901M.jpg', 3, 9, 11, 11, 1, '2022-07-13 04:22:29', '2022-07-13 05:01:45', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_foreign` (`categories`),
  ADD KEY `products_product_type_foreign` (`product_type`),
  ADD KEY `products_supplier_foreign` (`supplier`),
  ADD KEY `products_brand_foreign` (`brand`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_foreign` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_categories_foreign` FOREIGN KEY (`categories`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_type_foreign` FOREIGN KEY (`product_type`) REFERENCES `product_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_foreign` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
