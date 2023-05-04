-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 06:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(24, 'shanes', 'shane', '7790ffbb26cf6409e707105e92cde91e'),
(26, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(32, 'Chinese', 'Food_Category_26.jpeg', 'Yes', 'Yes'),
(33, 'Indian', 'Food_Category_573.jpeg', 'Yes', 'Yes'),
(34, 'Italian', 'Food_Category_580.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(11, 'Chow-Mein', 'stir-fried noodles that are cooked with a variety of vegetables and meats, such as chicken, beef, or shrimp. The dish may also include soy sauce, oyster sauce, or other seasonings for added flavor.', '10.00', 'Food-Name-7969.jpeg', 32, 'Yes', 'Yes'),
(12, 'Sweet and sour chicken', 'tender pieces of chicken that are coated in a crispy batter and then cooked with a sweet and tangy sauce. The sauce is typically made with a combination of sugar, vinegar, soy sauce, and ketchup, and may also include other ingredients like pineapple, bell peppers, and onions. ', '6.00', 'Food-Name-2217.jpeg', 32, 'No', 'Yes'),
(13, 'Fried Dumpings', 'typically consists of a small, filled pastry that is pan-fried until crispy on the bottom and steamed on the top. The filling can be made with a variety of ingredients, such as ground pork, shrimp, vegetables, or a combination of these. The dumplings are usually served with a dipping sauce made from soy sauce, vinegar, and chili oil', '4.00', 'Food-Name-9975.jpeg', 32, 'No', 'Yes'),
(14, 'Biryani ', 'Biryani is a popular South Asian dish that consists of fragrant, spiced rice that is layered with meat, vegetables, and/or eggs. The meat used in biryani can be chicken, beef, lamb, or goat, and the vegetables may include potatoes, carrots, and peas. ', '9.00', 'Food-Name-105.jpeg', 33, 'Yes', 'Yes'),
(15, 'Chicken Curry', 'Curry is a dish that originated in South Asia and has become popular around the world. It typically consists of a spiced sauce that is made with a combination of vegetables, meat, or seafood, along with a blend of aromatic spices such as turmeric, cumin, coriander, and ginger.', '8.00', 'Food-Name-4375.jpeg', 33, 'No', 'Yes'),
(17, 'Tandoori Chicken', 'andoori chicken is a popular Indian dish made by marinating chicken in a mixture of yogurt and spices, including tandoori masala, ginger, garlic, cumin, and cayenne pepper. The marinated chicken is then traditionally cooked in a clay oven called a tandoor, which gives it a charred, smoky flavor and a bright red hue.', '7.00', 'Food-Name-3270.jpeg', 33, 'No', 'Yes'),
(19, 'Pizza', '', '12.00', 'Food-Name-3737.jpeg', 34, 'Yes', 'Yes'),
(20, 'Risotto', 'Risotto is a classic Italian rice dish made with a short-grain, starchy rice variety such as Arborio or Carnaroli. The rice is typically cooked slowly in a broth or stock, with constant stirring to release the starches and create a creamy consistency. As the rice cooks, other ingredients such as onions, garlic, wine, and cheese can be added to enhance the flavor. Additional ingredients such as vegetables, meat, or seafood can also be incorporated to create different variations of the dish. The final result should be a creamy, slightly firm texture with a rich flavor. Risotto is often served as a main dish, but can also be used as a side dish or as a base for other recipes.', '9.00', 'Food-Name-3734.webp', 34, 'No', 'Yes'),
(21, 'carbonara', 'Carbonara is a classic Italian pasta dish that originates from Rome. It is typically made with spaghetti or another long pasta, tossed with a sauce made from eggs, cheese, black pepper, and guanciale (cured pork cheek) or pancetta (cured pork belly). The eggs are whisked together with grated cheese and black pepper to create a creamy sauce that is added to the cooked pasta along with the crisped guanciale or pancetta.', '7.00', 'Food-Name-1766.jpeg', 34, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Pizza', '24.00', 2, '48.00', '2023-04-28 09:48:04', 'Arrived', 'few', 'fwe', 'few@gmail.com', 'fewfw'),
(2, 'peanut232', '5.00', 2, '10.00', '2023-05-01 04:53:47', 'Arrived', 'gergr', 'gergerg', 'few@gmail.com', 'gre'),
(3, 'Biryani ', '9.00', 4, '36.00', '2023-05-01 09:07:44', 'Arrived', 'Sena McNally', '324', 'few@gmail.com', 'few'),
(4, 'Chow-Mein', '8.00', 3, '24.00', '2023-05-02 02:20:13', 'Arrived', 'n', 'few', 'few@gmail.com', 's'),
(5, 'Chow-Mein', '10.00', 3, '30.00', '2023-05-04 04:29:01', 'Arrived', 'Sean McNally', '87342879472894', 'hi@gmail.com', '23472389478932oifewefwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
