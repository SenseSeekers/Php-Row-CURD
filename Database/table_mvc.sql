-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2018 at 05:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `table_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`id`, `company`, `model`, `details`, `price`) VALUES
(1, 'Mathematics_iii', 'hoq publication', 'n/a', '250');

-- --------------------------------------------------------

--
-- Table structure for table `tb_book_data`
--

CREATE TABLE `tb_book_data` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `published_date` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_book_data`
--

INSERT INTO `tb_book_data` (`id`, `book_name`, `author_name`, `published_date`, `price`) VALUES
(3, 'chemistry', 'technology', '2018-12-14', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_car`
--

CREATE TABLE `tb_car` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cosmatics`
--

CREATE TABLE `tb_cosmatics` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cosmatics`
--

INSERT INTO `tb_cosmatics` (`id`, `company`, `model`, `details`, `price`) VALUES
(1, 'mslam', 'chaina', 'multi-vitemin cream', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dress`
--

CREATE TABLE `tb_dress` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dress`
--

INSERT INTO `tb_dress` (`id`, `company`, `model`, `details`, `price`) VALUES
(2, 'tre_short', 'five pic', 'n/a', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_electronics`
--

CREATE TABLE `tb_electronics` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_electronics`
--

INSERT INTO `tb_electronics` (`id`, `company`, `model`, `details`, `price`) VALUES
(2, 'B R B cable', '1*9', 'n/a', '80'),
(3, 'light', '1000w', 'n/a', '60'),
(4, 'Fan', '100hr', 'n/a', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_furniture`
--

CREATE TABLE `tb_furniture` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_furniture`
--

INSERT INTO `tb_furniture` (`id`, `company`, `model`, `details`, `price`) VALUES
(3, 'tvs', 'SAXE510C24K1', 'n/a', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laptop`
--

CREATE TABLE `tb_laptop` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `detailes` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laptop`
--

INSERT INTO `tb_laptop` (`id`, `company`, `model`, `detailes`, `price`) VALUES
(1, 'hjjk', 'oipu', '', '123453'),
(2, 'sumsung', 'SAXE510C24K1', '', '400000'),
(3, 'nokia', 'SAXE510C24K1', 'fsda', '345'),
(4, 'thinkpad', 'sl4110', 'n/a', '100'),
(5, 'lenovel', 'xs234', 'n/a', '1234'),
(6, 'nokia', 'SAXE510C24K1', 'df', '1000'),
(7, 'dasfaafs', 'adfafa', 'adff', '2344');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobile`
--

CREATE TABLE `tb_mobile` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobile`
--

INSERT INTO `tb_mobile` (`id`, `company`, `model`, `details`, `price`) VALUES
(10, 'NOKIA', 'ASA', 'N/A', '2500'),
(12, 'iTEL', 'IT2170', 'N/A', '1000'),
(13, 'WINMAX', 'X870', 'N/A', '6000'),
(14, 'nokia', '1110', 'n/a', '1000'),
(17, 'mlsam', 'chaina', '\r\nProduct Details: Vitamin C (20%) and Hyaluronic (11%), Ferulic (0.5%) and Amino Acids. Packed with Essential Antioxidants Contains 98% Natural and 72% Organic Ingredients .', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_td`
--

CREATE TABLE `tb_td` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_td`
--

INSERT INTO `tb_td` (`id`, `company`, `model`, `details`, `price`) VALUES
(1, 'BMW', 'SAXE510C24K1', 'sdfa', '100000000'),
(2, 'super', 'bad4100', 'this is not car details .', '0000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tv`
--

CREATE TABLE `tb_tv` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tv`
--

INSERT INTO `tb_tv` (`id`, `company`, `model`, `details`, `price`) VALUES
(1, 'samsung', 'lgl', 'n/a', '9800'),
(2, 'sonny', '19`', 'n/a', '7000'),
(3, 'samsung', 'sf350', 'this is a led', '7500'),
(4, 'walton', '24`', 'n/a', '100'),
(5, 'sonnyRang', 'sl455', 'n/a', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `td_byke`
--

CREATE TABLE `td_byke` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_byke`
--

INSERT INTO `td_byke` (`id`, `company`, `model`, `details`, `price`) VALUES
(1, 'Discover bike', '100mcc', 'n/a', '1200000'),
(3, 'Tvs', 'sl:q123', 'n/a', '100000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_book_data`
--
ALTER TABLE `tb_book_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cosmatics`
--
ALTER TABLE `tb_cosmatics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dress`
--
ALTER TABLE `tb_dress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_electronics`
--
ALTER TABLE `tb_electronics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_furniture`
--
ALTER TABLE `tb_furniture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laptop`
--
ALTER TABLE `tb_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mobile`
--
ALTER TABLE `tb_mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_td`
--
ALTER TABLE `tb_td`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tv`
--
ALTER TABLE `tb_tv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_byke`
--
ALTER TABLE `td_byke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_book_data`
--
ALTER TABLE `tb_book_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_cosmatics`
--
ALTER TABLE `tb_cosmatics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dress`
--
ALTER TABLE `tb_dress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_electronics`
--
ALTER TABLE `tb_electronics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_furniture`
--
ALTER TABLE `tb_furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_laptop`
--
ALTER TABLE `tb_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mobile`
--
ALTER TABLE `tb_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_td`
--
ALTER TABLE `tb_td`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tv`
--
ALTER TABLE `tb_tv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `td_byke`
--
ALTER TABLE `td_byke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
