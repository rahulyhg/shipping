-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 10:54 AM
-- Server version: 5.5.32
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Company', '', '', 'site/viewcompany', 1, 0, 1, 1, 'icon-user'),
(6, 'License', '', '', 'site/viewlicense', 1, 0, 1, 3, 'icon-user');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_company`
--

CREATE TABLE IF NOT EXISTS `shipping_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `ieccode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_company`
--

INSERT INTO `shipping_company` (`id`, `name`, `pancard`, `address`, `ieccode`, `status`) VALUES
(1, 'Bayer', '31767126RTDC3', 'Fort Mumbai', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_export`
--

CREATE TABLE IF NOT EXISTS `shipping_export` (
  `id` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` double NOT NULL,
  `rateperkgusd` double NOT NULL,
  `fobinusd` double NOT NULL,
  `fobinrs` double NOT NULL,
  `status` int(11) NOT NULL,
  `exportbalanceqty` int(11) NOT NULL,
  `exportbalanceusd` double NOT NULL,
  `exportexpirydate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_export`
--

INSERT INTO `shipping_export` (`id`, `license`, `product`, `qty`, `rateperkgusd`, `fobinusd`, `fobinrs`, `status`, `exportbalanceqty`, `exportbalanceusd`, `exportexpirydate`) VALUES
(1, 1, 'avinash', 100, 10, 1000, 66610, 1, 25, 250, '2016-04-20'),
(2, 3, '62/0- IMIDACLOPRID 70 WG (EVIDENCE WG 70/ ADMIRE/CONFIDOR 70 WG)', 250000, 37, 9250000, 616605000, 1, 250000, 0, '2016-12-17'),
(3, 4, 'OXADIARGYL TECHNICAL 96%', 50000, 48, 2400000, 159984000, 1, 27600, 1024127.04, '2015-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_import`
--

CREATE TABLE IF NOT EXISTS `shipping_import` (
  `id` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `norm` double NOT NULL,
  `appliedqty` double NOT NULL,
  `rateperkgusd` double NOT NULL,
  `cifinusd` double NOT NULL,
  `cifinrs` double NOT NULL,
  `billofentryno` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `cifwithoutnormusd` double NOT NULL,
  `cifwithoutnormrs` double NOT NULL,
  `finalqty` double NOT NULL,
  `importbalanceqty` double NOT NULL,
  `importbalanceamount` double NOT NULL,
  `differenceqty` double NOT NULL,
  `differenceamount` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_import`
--

INSERT INTO `shipping_import` (`id`, `license`, `product`, `norm`, `appliedqty`, `rateperkgusd`, `cifinusd`, `cifinrs`, `billofentryno`, `date`, `status`, `cifwithoutnormusd`, `cifwithoutnormrs`, `finalqty`, `importbalanceqty`, `importbalanceamount`, `differenceqty`, `differenceamount`) VALUES
(6, 1, 'ACRYLIC POLYMER C-20 (INDOFIL C-20)', 0.9, 100000, 350, 31500, 2098215, '', '0000-00-00', 1, 35000000, 2331350000, 90, 90, 31500, 0, 0),
(7, 1, '2 ACRYLIC POLYMER C-20 (INDOFIL C-20)', 0.9, 100, 100, 9000, 599490, '', '0000-00-00', 1, 10000, 666100, 90, 30, 3000, 60, 6000),
(8, 3, 'IMIDACLOPRID TECHNICAL 94% MIN', 0, 178250, 43.5, 0, 0, '', '0000-00-00', 1, 7753875, 516873307.5, 0, 178250, 7753875, 0, 0),
(9, 3, 'SODIUM LIGNO SULFONATE', 0, 72000, 4, 0, 0, '', '0000-00-00', 1, 288000, 19198080, 0, 72000, 288000, 0, 0),
(10, 4, 'OXADIAZON TECHNICAL', 1.088, 54400, 35, 1904000, 126920640, '', '0000-00-00', 1, 1904000, 126920640, 54400, 1400, 614000, 53000, 1290000),
(11, 4, 'PROPARGYL CHLORIDE ON 100% BASIS', 0.251, 12550, 10, 125500, 8365830, '', '0000-00-00', 1, 125500, 8365830, 12550, 12550, 125500, 0, 0),
(12, 4, 'XYLENE', 0.131, 6550, 2, 13100, 873246, '', '0000-00-00', 1, 13100, 873246, 6550, 6550, 13100, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_license`
--

CREATE TABLE IF NOT EXISTS `shipping_license` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `company` int(11) NOT NULL,
  `issuedate` date NOT NULL,
  `expirydate` date NOT NULL,
  `extention` date NOT NULL,
  `status` int(11) NOT NULL,
  `importexpirydate` date NOT NULL,
  `usdrate` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_license`
--

INSERT INTO `shipping_license` (`id`, `number`, `company`, `issuedate`, `expirydate`, `extention`, `status`, `importexpirydate`, `usdrate`) VALUES
(1, 'L1', 1, '2016-04-14', '2016-09-24', '2016-10-29', 1, '2016-04-13', 66.61),
(2, 'L2', 1, '2016-04-22', '2016-12-24', '2016-12-24', 1, '2016-04-23', 66.54),
(3, '0388048565', 1, '2015-06-17', '2016-12-17', '0000-00-00', 1, '2016-06-17', 66.66),
(4, '0310754062/2/03/00', 1, '2013-10-17', '2015-06-17', '0000-00-00', 1, '2014-10-17', 66.66);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_shippingexport`
--

CREATE TABLE IF NOT EXISTS `shipping_shippingexport` (
  `id` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `shippingbillno` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `material` varchar(255) NOT NULL,
  `qty` double NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `manualfobrs` double NOT NULL,
  `actualrealisedebrcusd` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_shippingexport`
--

INSERT INTO `shipping_shippingexport` (`id`, `license`, `shippingbillno`, `date`, `material`, `qty`, `amount`, `status`, `manualfobrs`, `actualrealisedebrcusd`) VALUES
(5, 1, '1', '2016-04-22', '1', 50, 500, 1, 0, 0),
(6, 1, '2', '2016-04-29', '1', 25, 250, 1, 0, 0),
(7, 4, '1450377', '2015-06-27', '3', 10000, 614469.98, 1, 0, 0),
(8, 4, '3591380', '2015-10-16', '3', 7400, 454327.99, 1, 0, 0),
(9, 4, '3670107', '2015-10-20', '3', 5000, 307074.99, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_shippingimport`
--

CREATE TABLE IF NOT EXISTS `shipping_shippingimport` (
  `id` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `billofentry` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `material` int(11) NOT NULL,
  `qty` double NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_shippingimport`
--

INSERT INTO `shipping_shippingimport` (`id`, `license`, `billofentry`, `date`, `material`, `qty`, `amount`, `status`) VALUES
(3, 1, '1', '2016-04-22', 6, 10000, 1500000, 1),
(6, 1, '4', '2016-04-28', 7, 50, 5000, 1),
(7, 1, '5', '2016-04-29', 7, 10, 1000, 1),
(8, 4, '3914334', '2013-11-26', 10, 20000, 600000, 1),
(9, 4, '4660941', '2014-02-18', 10, 13000, 90000, 1),
(10, 4, '4716609', '2014-02-22', 10, 20000, 600000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`) VALUES
(1, 'Avinash Ghare', '9189e4085a9a76fd59d76d688adb4bee', 'avinashghare572@gmail.com', 1, '0000-00-00 00:00:00', 1, 'Hydrangeas.jpg', '', '', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_company`
--
ALTER TABLE `shipping_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_export`
--
ALTER TABLE `shipping_export`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_import`
--
ALTER TABLE `shipping_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_license`
--
ALTER TABLE `shipping_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_shippingexport`
--
ALTER TABLE `shipping_shippingexport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_shippingimport`
--
ALTER TABLE `shipping_shippingimport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipping_company`
--
ALTER TABLE `shipping_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipping_export`
--
ALTER TABLE `shipping_export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shipping_import`
--
ALTER TABLE `shipping_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `shipping_license`
--
ALTER TABLE `shipping_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shipping_shippingexport`
--
ALTER TABLE `shipping_shippingexport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shipping_shippingimport`
--
ALTER TABLE `shipping_shippingimport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
