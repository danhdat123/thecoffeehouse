-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 02:21 PM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(1, 'Trà Đào Cam Sả Đá', 45000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', 'tra-dao1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(2, 'Trà Đào Cam Sả Nóng', 45000, 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', 'tra-dao2.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(3, 'Trà Hạt Sen Đá', 45000, 'Nền trà ô long hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', 'hat-sen1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(4, 'Trà Hạt Sen Nóng', 52000, 'Nền trà ô long hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', 'hat-sen1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(5, 'Trà Sữa ô long Nướng Trân Châu', 52000, 'Hương vị chân ái đúng gu đậm đà với trà Oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.', 'hongdao.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(6, 'Hồng Trà Sữa Trân Châu', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã', 'tran-chau1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(7, 'Hồng Trà Sữa Trân Châu 2', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', 'tran-chau1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(8, 'Hồng Trà Sữa Trân Châu 3', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', 'tran-chau1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0),
(9, 'Hồng Trà Sữa Trân Châu 4', 52000, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', 'tran-chau1.jpg', '2023-04-21 09:33:13', '2023-04-21 09:34:38', NULL, 0);

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
(11, 1, 'user2', '1344c1a4c0574551a99df86d8769741f', 'abc1@gmail.com', '0384161499', '', '2023-04-21 09:39:53', '2023-04-21 09:39:53', NULL),
(12, 1, 'user3', '6df546ce5a70dc4385556597e04eb274', '502200027@stu.itc.edu.vn', '0384168498', '', '2023-04-21 09:39:53', '2023-04-21 09:39:53', NULL),
(13, 1, 'user6', '912ec803b2ce49e4a541068d495ab570', 'abc@gmail.com', '0385161498', '', '2023-04-21 09:39:53', '2023-04-21 09:39:53', NULL),
(14, 1, 'user7', '6a204bd89f3c8348afd5c77c717a097a', 'namlem4u@gmail.com', '03841614989', '', '2023-04-21 09:39:53', '2023-04-21 09:39:53', NULL),
(16, 1, 'nguyen danh dat', 'f9d5f34186537f60edea99302e9fbf53', 'namlem4u@gmail.com', 'asdfsadfasdfs', '36 Tran quy cap, kp 7, tan an, laig', '2023-04-24 04:31:41', NULL, NULL),
(17, 1, 'nguyen danh dat2', 'f9d5f34186537f60edea99302e9fbf53', 'namlem3u@gmail.com', '038416498', 'asfsadfasfsa', '2023-04-24 04:40:04', NULL, '2023-04-24 04:40:04'),
(18, 1, 'nguyen danh dat', 'f9d5f34186537f60edea99302e9fbf53', 'namlem2u@gmail.com', '03841468', 'asdfasfassdfasfasd', '2023-04-24 04:51:06', NULL, '2023-04-24 04:51:06');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_category_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
