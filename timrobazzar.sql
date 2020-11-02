-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timrobazzar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogin`
--

CREATE TABLE `tbl_adminlogin` (
  `adm_id` bigint(20) NOT NULL,
  `adm_fname` varchar(25) DEFAULT NULL,
  `adm_lastname` varchar(25) DEFAULT NULL,
  `adm_email` varchar(50) DEFAULT NULL,
  `adm_password` varchar(255) DEFAULT NULL,
  `adm_role` enum('superadmin','subadmin') DEFAULT NULL,
  `adm_status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminlogin`
--

INSERT INTO `tbl_adminlogin` (`adm_id`, `adm_fname`, `adm_lastname`, `adm_email`, `adm_password`, `adm_role`, `adm_status`) VALUES
(1, 'Super ', 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'active'),
(2, 'Nikita', 'Bhandari', 'nikita@gmail.com', 'b00a50c448238a71ed479f81fa4d9066', 'subadmin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE `tbl_inquiry` (
  `inquiry_id` bigint(50) NOT NULL,
  `pro_id` bigint(50) DEFAULT NULL,
  `inquiry_to` bigint(50) DEFAULT NULL,
  `inquiry_by` bigint(50) DEFAULT NULL,
  `inquiry_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `inquiry_pro_photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`inquiry_id`, `pro_id`, `inquiry_to`, `inquiry_by`, `inquiry_date`, `inquiry_pro_photo`) VALUES
(38, 11, 14, 8, '2019-08-01 05:13:28', 'Redmi-Note-7-Pro.jpg'),
(39, 13, 14, 8, '2019-08-01 07:57:46', 'lenovo-ideapad.jpg'),
(40, 16, 12, 14, '2019-12-15 08:42:59', 'Redmi-Note-7-Pro.jpg'),
(41, 17, 14, 12, '2019-12-15 09:00:51', 'iphonex.png'),
(42, 8, 8, 14, '2020-03-27 03:17:07', '71335454iphone.jpg'),
(43, 19, 12, 14, '2020-03-27 03:23:34', '71335454iphone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry_confirm`
--

CREATE TABLE `tbl_inquiry_confirm` (
  `confirm_id` bigint(50) NOT NULL,
  `confirm_pro_id` bigint(50) DEFAULT NULL,
  `confirm_to` bigint(50) DEFAULT NULL,
  `confirm_by` bigint(50) DEFAULT NULL,
  `confirm_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiry_confirm`
--

INSERT INTO `tbl_inquiry_confirm` (`confirm_id`, `confirm_pro_id`, `confirm_to`, `confirm_by`, `confirm_date`) VALUES
(56, 11, 8, 14, '2019-08-01 05:14:57'),
(57, 13, 8, 14, '2019-08-01 07:58:23'),
(58, 15, 14, 12, '2019-12-13 08:06:27'),
(60, 17, 12, 14, '2019-12-15 09:01:34'),
(61, 8, 14, 8, '2020-03-27 03:17:28'),
(62, 19, 14, 12, '2020-03-27 03:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_request`
--

CREATE TABLE `tbl_product_request` (
  `pro_id` bigint(50) NOT NULL,
  `pro_type` enum('Mobile','Laptop','Tablet','Mp3 Player') DEFAULT NULL,
  `pro_name` varchar(50) DEFAULT NULL,
  `pro_brand` varchar(50) DEFAULT NULL,
  `pro_price_offer` bigint(50) DEFAULT NULL,
  `pro_description` varchar(255) DEFAULT NULL,
  `pro_req_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_requesting_user` bigint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_request`
--

INSERT INTO `tbl_product_request` (`pro_id`, `pro_type`, `pro_name`, `pro_brand`, `pro_price_offer`, `pro_description`, `pro_req_date`, `pro_requesting_user`) VALUES
(8, 'Mobile', 'Iphone X', 'Apple', 75000, 'Second Hand', '2019-06-28 09:33:20', 8),
(11, 'Mobile', 'Redmi Note 7', 'Xaomi', 20000, '128 gb rom, blue color, 4 gb ram', '2019-07-03 15:57:10', 14),
(12, 'Mobile', 'Redmi Note 7', 'Xaomi', 15000, 'Blue Color, with in 2 days plz', '2019-08-01 05:11:12', 6),
(13, 'Laptop', 'Dell core i5', 'Dell', 500000, 'Second Hand, red color', '2019-08-01 07:57:02', 14),
(14, 'Laptop', 'Dell Laptop G1', 'Dell', 70000, 'Second or third hand', '2019-11-29 04:50:35', 12),
(15, 'Mobile', 'samsung s3', 'samsung', 12000, 'second hand, red', '2019-12-13 08:05:09', 12),
(16, 'Laptop', 'Dell Laptop G1', 'Dell', 30000, 'Second Hand', '2019-12-15 08:41:51', 12),
(17, 'Mobile', 'Iphone 11', 'Iphone', 100000, 'Golden color, second hand', '2019-12-15 08:46:49', 14),
(18, 'Laptop', 'Dell Insiron 3000', 'Dell', 30000, 'white, second hand', '2019-12-15 10:29:00', 15),
(19, 'Mobile', 'Iphone 11 pro', 'Iphone', 70000, 'Second Hand or third hand, color red', '2020-03-27 03:22:40', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sealed_deal`
--

CREATE TABLE `tbl_sealed_deal` (
  `sealed_id` bigint(50) NOT NULL,
  `sealed_pro_name` varchar(50) DEFAULT NULL,
  `sealed_buyer_id` bigint(50) DEFAULT NULL,
  `sealed_seller_id` bigint(50) DEFAULT NULL,
  `sealed_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sealed_deal`
--

INSERT INTO `tbl_sealed_deal` (`sealed_id`, `sealed_pro_name`, `sealed_buyer_id`, `sealed_seller_id`, `sealed_date`) VALUES
(6, 'Dell core i5', 6, NULL, '2019-07-15 16:22:47'),
(7, 'Gionee S11 lite', 6, NULL, '2019-07-15 18:20:42'),
(8, 'Iphone X', 12, NULL, '2019-07-30 13:30:13'),
(9, 'Dell Inspiron', 12, NULL, '2019-07-30 13:44:00'),
(10, 'Dell Inspiron', 3, NULL, '2019-07-30 13:48:21'),
(11, 'Iphone X', 3, NULL, '2019-07-30 13:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogin`
--

CREATE TABLE `tbl_userlogin` (
  `user_id` bigint(50) NOT NULL,
  `user_fname` varchar(25) DEFAULT NULL,
  `user_lname` varchar(25) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userlogin`
--

INSERT INTO `tbl_userlogin` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_username`, `user_password`, `user_address`, `user_phone`) VALUES
(3, 'Hari', 'Tuladhar', 'hari@gmail.com', 'hari', 'a9bcf1e4d7b95a22e2975c812d938889', 'Kalimati', '9856345612'),
(4, 'Vikram', 'Varabhyaha', 'vikram@gmail.com', 'vikram', '4f03a3d7d3dffa764d27606ff3773311', 'Chobar', '9848234561'),
(6, 'Radha', 'Rani', 'radha@gmail.com', 'radha', '0280a430e35fee634f01cbc5a8178864', 'Gokul', '9867555555'),
(7, 'Dawa', 'Sherpa', 'dawa@gmail.com', 'dawa', 'c8a55d1ef5c229651af0d4b6ce520203', 'Milanchowk', '9867456734'),
(8, 'Bhopal', 'Bhakta', 'bhopal@gmail.com', 'bhopal', 'c621eb8cf9387588e76a910913b7acfc', 'Bhopal', '9834562345'),
(10, 'Birat', 'Bhujel', 'birat@gmail.com', 'birat', '290b113adc640c6de4c8af474aefbd67', 'Chandol', '9867453567'),
(12, 'Raj', 'Basnet', 'raj@gmail.com', 'raj', '65a1223dae83b8092c4edba0823a793c', 'Kapan', '9867456723'),
(13, 'Balkrishna', 'Budhathoki', 'balu@gmail.com', 'balu', 'bc84dec3a5a16b5fad9f53d6676f063e', 'Kapan', '9867456723'),
(14, 'Saraswoti', 'Bhandari', 'sara@gmail.com', 'sara', '5bd537fc3789b5482e4936968f0fde95', 'Kapan', '9867564523'),
(15, 'Rejina', 'Sangat', 'rejina@gmail.com', 'rejina', '7b6c27458a726d883122a93ba1e0bb14', 'Kapan', '9856453425');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `tbl_inquiry_confirm`
--
ALTER TABLE `tbl_inquiry_confirm`
  ADD PRIMARY KEY (`confirm_id`);

--
-- Indexes for table `tbl_product_request`
--
ALTER TABLE `tbl_product_request`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_sealed_deal`
--
ALTER TABLE `tbl_sealed_deal`
  ADD PRIMARY KEY (`sealed_id`);

--
-- Indexes for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  MODIFY `adm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `inquiry_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_inquiry_confirm`
--
ALTER TABLE `tbl_inquiry_confirm`
  MODIFY `confirm_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_product_request`
--
ALTER TABLE `tbl_product_request`
  MODIFY `pro_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_sealed_deal`
--
ALTER TABLE `tbl_sealed_deal`
  MODIFY `sealed_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  MODIFY `user_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
