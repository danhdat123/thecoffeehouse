-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2023 at 12:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecoffeehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cafe', 11, '2023-04-24 16:22:01', '2023-04-24 16:22:01', NULL),
(2, 'tea', 11, '2023-04-24 16:22:01', '2023-04-24 16:22:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `viewed` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int NOT NULL,
  `star` double NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `description`, `image`, `viewed`, `created_at`, `updated_at`, `deleted_at`, `category_id`, `star`) VALUES
(1, 'Trà Đào Cam Sả Đá', 45000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '/public/image/products/tra-dao1.jpg', 5205, '2023-05-01 10:57:12', '2023-04-21 09:34:38', '2023-05-01 10:31:57', 0, 1),
(2, 'Trà Đào Cam Sả Nóng', 45000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '/public/image/products/tra-dao2.jpg', 8, '2023-05-01 11:50:54', '2023-04-21 09:34:38', NULL, 0, 4),
(3, 'Trà Hạt Sen Đá', 45000, 'Nền trà ô long hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '/public/image/products/hat-sen1.jpg', 2, '2023-05-01 11:50:57', '2023-04-21 09:34:38', NULL, 0, 1),
(4, 'Trà Hạt Sen Nóng', 52000, 'Nền trà ô long hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '/public/image/products/hat-sen1.jpg', 0, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 5),
(5, 'Trà Sữa ô long Nướng Trân Châu', 52000, 'Hương vị chân ái đúng gu đậm đà với trà Oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.', '/public/image/products/hongdao.jpg', 8000, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(6, 'Hồng Trà Sữa Trân Châu', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã', '/public/image/products/tran-chau1.jpg', 0, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(7, 'Hồng Trà Sữa Trân Châu 2', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', '/public/image/products/tran-chau1.jpg', 0, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(8, 'Hồng Trà Sữa Trân Châu 3', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', '/public/image/products/tran-chau1.jpg', 2, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(9, 'Hồng Trà Sữa Trân Châu 4', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', '/public/image/products/tran-chau1.jpg', 1, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(16, 'Rựu nho', 100000, '<h2><strong>Rựu nho</strong></h2><figure class=\"image\"><img src=\"https://thecoffeehouse.test/public/image/uploads/4.jpg\"></figure><blockquote><p>Đặc sản Ninh Thuận</p></blockquote><p>Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.</p>', '/public/image/products/tran-chau1.jpg', 0, '2023-05-01 10:57:12', '2023-04-25 17:39:53', '2023-05-01 10:33:41', 2, 1),
(18, 'Rựu nho', 100000, '<h2><strong>Rựu nho</strong></h2><figure class=\"image\"><img src=\"https://thecoffeehouse.test/public/image/uploads/4.jpg\"></figure><blockquote><p>Đặc sản Ninh Thuận</p></blockquote><p>Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.</p>', '/public/image/products/tran-chau1.jpg', 0, '2023-05-01 10:57:12', '2023-04-25 17:39:53', '2023-05-01 10:32:05', 2, 1),
(19, 'Trà Đào Cam Sả Đá', 45000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '/public/image/products/tra-dao1.jpg', 5000, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(20, 'Trà Đào Cam Sả Nóng', 45000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '/public/image/products/tra-dao2.jpg', 2, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 4),
(21, 'Trà Hạt Sen Đá', 45000, 'Nền trà ô long hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '/public/image/products/hat-sen1.jpg', 1, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(22, 'Trà Hạt Sen Nóng', 52000, 'Nền trà ô long hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '/public/image/products/hat-sen1.jpg', 0, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 5),
(23, 'Trà Sữa ô long Nướng Trân Châu', 52000, 'Hương vị chân ái đúng gu đậm đà với trà Oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.', '/public/image/products/hongdao.jpg', 8000, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(24, 'Hồng Trà Sữa Trân Châu', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã', '/public/image/products/tran-chau1.jpg', 0, '2023-05-01 10:57:12', '2023-04-21 09:34:38', NULL, 0, 1),
(34, 'hàng khủng', 12, 'em tuyêt vời', 'public/image/products/2.jpg', 0, '2023-05-01 11:02:10', '2023-05-01 11:01:00', '2023-05-01 11:02:10', 2, 5),
(35, 'ádfsadfsdf', 121, '\r\n                                                        ádfsadfasdf', '/public/image/products/1.jpg', 0, '2023-05-01 11:02:04', '2023-05-01 11:02:04', NULL, 2, 5),
(36, 'my product', 1000, '\r\n                                                        sdfsdfsdfsda', '/public/image/products/2.jpg', 0, '2023-05-01 11:04:33', '2023-05-01 11:04:23', '2023-05-01 11:04:33', 2, 5),
(37, 'ádfsadfsdf', 121, '                                                                        \r\n                                                        ádfsadfasdf                                                        ', '/public/image/products/2.jpg', 0, '2023-05-01 11:07:06', '2023-05-01 11:07:06', NULL, 1, 5),
(38, 'asdfasdfasdf', 100023, '\r\n                                                        asdfsafsadf', '/public/image/products/3.jpg', 0, '2023-05-01 11:14:11', '2023-05-01 11:14:05', '2023-05-01 11:14:11', 2, 5),
(39, 'Rựu nho', 10000, '\r\n                                                        ', '/public/image/products/1.jpg', 0, '2023-05-01 11:50:28', '2023-05-01 11:49:50', '2023-05-01 11:50:28', 2, 5),
(40, 'Rựu nho', 1000, '\r\n                                                        hghjfghfhgfhgf', '/public/image/products/1.jpg', 0, '2023-05-01 11:50:24', '2023-05-01 11:50:06', '2023-05-01 11:50:24', 1, 5),
(41, 'ádfsadfsdf', 121, '                                                                        \r\n                                                        ádfsadfasdf                                                        ', '/public/image/products/3.jpg', 0, '2023-05-01 11:50:43', '2023-05-01 11:50:43', NULL, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'member', '2023-04-24 09:41:53', '2023-04-24 02:41:53', '2023-04-24 02:41:53'),
(2, 'admin', '2023-04-24 09:41:53', '2023-04-24 02:41:53', '2023-04-24 02:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `size` enum('M','L','S','') COLLATE utf8mb4_general_ci DEFAULT 'M',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','ship','success','cancel','confirm') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `user_id`, `product_id`, `quantity`, `size`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(29, 17, 1, 2, 'M', '2023-04-30 18:43:57', '2023-04-30 18:43:57', '2023-05-01 09:28:11', 'confirm'),
(30, 17, 2, 1, 'M', '2023-04-30 18:44:04', '2023-04-30 18:44:04', NULL, 'confirm'),
(31, 17, 1, 1, 'M', '2023-04-30 19:22:03', '2023-04-30 19:22:03', '2023-05-01 09:28:11', 'confirm'),
(32, 17, 2, 2, 'M', '2023-04-30 19:22:05', '2023-04-30 19:22:05', NULL, 'confirm'),
(33, 17, 5, 2, 'M', '2023-04-30 19:22:07', '2023-04-30 19:22:07', NULL, 'confirm'),
(34, 17, 9, 2, 'M', '2023-05-01 06:44:39', '2023-05-01 06:44:39', NULL, 'confirm'),
(35, 17, 2, 1, 'M', '2023-05-01 06:44:45', '2023-05-01 06:44:45', NULL, 'confirm'),
(36, 17, 6, 3, 'M', '2023-05-01 06:44:47', '2023-05-01 06:44:47', NULL, 'confirm'),
(37, 17, 5, 1, 'M', '2023-05-01 06:45:24', '2023-05-01 06:45:24', NULL, 'confirm'),
(41, 17, 1, 1, 'M', '2023-05-01 09:24:06', '2023-05-01 09:24:06', '2023-05-01 09:28:11', 'pending'),
(42, 17, 1, 1, 'M', '2023-05-01 10:04:43', '2023-05-01 10:04:43', NULL, 'confirm'),
(43, 17, 1, 8, 'M', '2023-05-01 10:08:02', '2023-05-01 10:08:02', NULL, 'confirm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `user_name`, `password`, `email`, `phone_number`, `address`, `updated_at`, `deleted_at`, `created_at`) VALUES
(17, 1, 'nguyen danh dat2', 'f9d5f34186537f60edea99302e9fbf53', 'datnguyen@gmail.com', '038416498', 'asfsadfasfsa', '2023-04-24 04:40:04', NULL, '2023-04-24 04:40:04'),
(18, 1, 'nguyen danh dat', 'f9d5f34186537f60edea99302e9fbf53', 'datnguyen@gmail.com', '03841468', 'asdfasfassdfasfasd', '2023-04-24 04:51:06', NULL, '2023-04-24 04:51:06'),
(21, 1, 'tèo', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenteo@gmail.com', '01234567', 'thôn đại đồng nhất, xã gio hòa', '2023-05-01 11:59:49', NULL, '2023-05-01 11:59:49'),
(22, 2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '012345678', 'thôn đại đồng nhất, xã gio hòa', '2023-05-01 12:03:13', NULL, '2023-05-01 12:03:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `FK_category_user` (`created_by`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`name`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_product` (`product_id`),
  ADD KEY `FK_order_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `FK_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `FK_order_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
