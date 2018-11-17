SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `sku_id` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `sku_id`, `category_id`, `product_name`, `image`, `price`, `brand`, `material`, `size`, `qty`, `created_date`, `updated_date`) VALUES
	(1, 'Cocp21_Beige_ Free Size', 1, 'Vaamsi Women''s Salwar Suit Dress Material', '715KDuUxMhL._UY500_.jpg', 800, 'lovely look', 'Cotton', '30', 6, '2016-10-03 00:00:00', '2016-10-17 15:40:09'),
	(2, 'sr_1_2', 1, 'Dress', '51XVWrQCvBL.jpg', 700, 'fashion', 'Fabric', '36', 5, '2016-10-03 00:00:00', '2016-10-17 15:40:17'),
	(3, 'V1667', 1, 'Jevi Prints Blue & White Unstitched Printed Synthetic Crepe Punjabi Suit Dupatta', '71SbtW5k5vL._UL1500_.jpg', 900, 'jevi', 'Synthetic', '32', 1, '2016-10-03 00:00:00', '2016-10-17 15:40:26'),
	(4, 'V1669', 1, 'Jevi Prints Orange Unstitched Printed Synthetic Crepe Patiyala Suit with Mangalgiri Border', '71Apqt3vaBL._UL1500_.jpg', 450, 'jevi', 'Synthetic', '28', 6, '2016-10-03 00:00:00', '2016-10-17 15:40:31'),
	(5, 'JM8956', 1, 'Janasya Women''s Pink Net Semi Stitched Dress', '51dIT3DALsL._UL1500_.jpg', 700, 'Janasya', 'Fabric', '28', 5, '2016-10-03 00:00:00', '2016-10-17 15:40:36'),
	(6, 'PAS245', 1, 'Patiala Salwar Embroidered Cotton Salwar Kameez Suit', '61-rBuCls-L._UL1500_.jpg', 600, 'Lady Line', 'Cotton', '34', 8, '2016-10-03 00:00:00', '2016-10-17 15:40:00'),
	(7, 'Sut658', 1, 'Surat Tex White Color Georgette Semi-Stitched salwar suits', '71A9vgzYDCL._UL1500_.jpg', 1500, 'lovely look', 'Fabric', '38', 3, '2016-10-03 00:00:00', '2016-10-17 15:39:54'),
	(8, 'sky_245_8', 1, 'Sky Global Women''s Sea Green Georgette Unstitched Salwar Suit?', '61l1K8Zc-fL._UL1500_.jpg', 4500, 'Sky Global', 'Fabric', '36', 8, '2016-10-03 00:00:00', '2016-10-05 15:12:42'),
	(9, 'JNE0937-BLUE-DR-COPPER', 1, 'Janasya Women''s Blue Net Semi Stiched Dress', '61w4SxGAbWL._UL1500_.jpg', 8578, 'Janasya', 'Synthetic', '38', 1, '2016-10-03 00:00:00', '2016-10-05 15:12:49'),
	(10, 'sky_85_cotton', 1, 'Sky Global Women''s Printed Unstitched Regular Wear Salwar Suit Dress Material', '71JQGZnfzDL._UL1500_.jpg', 987, 'Sky Global', 'Cotton', '32', 8, '2016-10-03 00:00:00', '2016-10-05 15:12:55');

ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;

