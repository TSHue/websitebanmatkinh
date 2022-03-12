-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 20, 2021 at 02:14 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glasses`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` varchar(10) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
('br1', 'Gucci'),
('br2', 'Prada'),
('br3', 'Dior'),
('br4', 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` varchar(20) NOT NULL,
  `cate_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
('GK', 'Gọng Kính'),
('KM', 'Kính Mát'),
('TK', 'Tròng kính');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` varchar(10) NOT NULL,
  `createdate` date NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `createdate`, `customer_name`, `phone`, `address`, `status`, `username`) VALUES
('order62', '2020-12-16', 'Nguyen Van C', 123456789, '180 Cao Lỗ, phường 4, Quận 8, TP. Hồ Chí Minh', 1, 'client02'),
('order79', '2020-12-14', 'Nguyen Van A', 123456789, '36/8 xom dat lanh binh thang', 1, 'client02'),
('order80', '2020-12-07', 'Nguyen Van B', 123456789, '180 Cao Lỗ, phường 4, Quận 8, TP. Hồ Chí Minh', 2, 'client01');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `amount`) VALUES
('order62', 'prod12', 2, 240000),
('order79', 'prod5', 1, 360000),
('order79', 'prod9', 1, 350000),
('order80', 'prod5', 1, 360000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` varchar(20) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `prod_brand` varchar(20) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `prod_image` varchar(200) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `prod_brand` (`prod_brand`),
  KEY `prod_type` (`prod_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `price`, `prod_brand`, `prod_type`, `prod_image`) VALUES
('prod1', 'Gong Kinh Can Hop Kim Cao Cap', 'Kich Thuoc : 52 - 19 - 144 ', 360000, 'br1', 'GK', '1607474007-gong_hopkim.jpg'),
('prod10', 'Kính Mát Tròn Ngố Thời Trang', '', 250000, 'br3', 'KM', 'kinh_mat2.jpg'),
('prod11', 'Kính Mát Tròn Thầy Bói', '', 350000, 'br1', 'KM', 'kinh_mat1.jpg'),
('prod12', 'Gọng kính tròn', 'Gọng kính làm bằng chất liệu nhựa TR90 giúp người mang kính được nhẹ nhàng, thoải mái và trọng lượng không quá nặng đè lên sống mũi.', 120000, 'br4', 'GK', 'gongadmin.jpg'),
('prod13', 'Kính Mát Nửa Viền Vuông', '', 350000, 'br1', 'KM', 'kinh_mat.jpg'),
('prod2', 'Gong Kinh Trong Suot Nhua Deo', 'Kich Thuoc : 52 - 16 - 138', 120000, 'br1', 'GK', '1605273879-gong_nhua.jpg'),
('prod3', 'Trong đổi Mau 2 IN 1 ', 'co chuc nang đoi mau tu nhat sang đam', 660000, 'br1', 'TK', '1605500655-trong.jpg'),
('prod4', 'Gong Kinh Can Vuong Thoi Trang Unisex', 'Kich Thuoc : 51 - 18 - 145', 990000, 'br4', 'GK', '1605520605-gong.jpg'),
('prod5', 'Trong Cat Anh Sang Xanh', '', 360000, 'br2', 'TK', '1605522681-trong1.jpg'),
('prod6', 'Gong hop kim', 'Kich Thuoc : 52 - 16 - 138', 120000, 'br1', 'GK', '1605592639-gong_hopkim.jpg'),
('prod7', 'Gong Form bau nho', '', 360000, 'br3', 'GK', '1605773627-gong_form_bau_nho.jpg'),
('prod8', 'Kính Mát Oval Thời Trang Unisex', 'Kích Thước : 56 - 15 - 146', 270000, 'br4', 'KM', 'kinh_mat4.jpg'),
('prod9', 'Kính Mát Vuông Thời Trang Nam', 'Kích Thước : 57 - 19 - 142 ', 350000, 'br1', 'KM', 'kinh_mat3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_account`
--

DROP TABLE IF EXISTS `t_account`;
CREATE TABLE IF NOT EXISTS `t_account` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`username`, `email`, `password`, `level`) VALUES
('adminshop', 'abc@gmail.com', '123456', 1),
('client01', 'aloha@gmail.com', '123456', 2),
('client02', 'abc123@gmail.com', '123456', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`username`) REFERENCES `t_account` (`username`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`prod_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_brand`) REFERENCES `brand` (`brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`prod_type`) REFERENCES `category` (`cate_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
