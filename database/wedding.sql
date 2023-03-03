-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 12:03 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `next_payment` int(11) NOT NULL,
  `due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `order_id`, `total`, `advance`, `discount`, `next_payment`, `due`) VALUES
(1, 39, 10000, 0, 1000, 9000, 0),
(2, 40, 4500, 0, 0, 0, 4500),
(3, 41, 9900, 5000, 900, 4000, 0),
(4, 42, 6500, 0, 0, 0, 6500),
(5, 43, 10000, 0, 500, 9500, 0),
(6, 44, 9900, 5000, 400, 4500, 0),
(7, 46, 10000, 1000, 1000, 7000, 1000),
(8, 47, 10000, 0, 0, 10000, 0),
(9, 48, 12000, 5000, 1000, 6000, 0),
(10, 50, 0, 0, 0, 0, 0),
(11, 51, 57500, 15000, 7500, 0, 35000),
(12, 52, 57500, 10000, 7500, 40000, 0),
(13, 53, 57500, 15000, 7500, 0, 35000),
(14, 54, 42000, 0, 2000, 0, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `mobile`, `password`, `profile_pic`) VALUES
(1, 'SM Rais Uddin Alvee', 'test@gmail.com', '01707066081', '16258383', '');

-- --------------------------------------------------------

--
-- Table structure for table `cinematography`
--

CREATE TABLE `cinematography` (
  `id` int(11) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinematography`
--

INSERT INTO `cinematography` (`id`, `catagory`, `price`) VALUES
(2, 'Standard Cinematographer', 3500),
(3, 'Senior Cinematographer', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `cinepackage`
--

CREATE TABLE `cinepackage` (
  `id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinepackage`
--

INSERT INTO `cinepackage` (`id`, `package_name`, `price`, `details`) VALUES
(1, 'Standard_Cinema_1', 4500, 'Cinematographer: 1 Top Cinematographer, Event Duration: 4 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity.'),
(2, 'Standard_Cinema_2', 7500, 'Cinematographer: 1 Top Cinematographer & 1 Junior Cinematographer , Event Duration: 4 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity.');

-- --------------------------------------------------------

--
-- Table structure for table `combopackage`
--

CREATE TABLE `combopackage` (
  `id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `combopackage`
--

INSERT INTO `combopackage` (`id`, `package_name`, `price`, `details`) VALUES
(1, 'Standard_1_Day_Combo', 9900, 'Photographer: 1 Top Photographer,\r\nCinematographer: 1 Top Cinematographer,\r\nEvent Duration: 5 Hours,\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies\r\nTrailer: 1 (2 - 2.30 minute Duration),\r\nBody: Depends on event activity,\r\n\r\nAll photo & Video will be delivered by CD.'),
(2, 'Standard_2_Day_Combo', 19500, 'Photographer: 1 Top Photographer, Cinematographer: 1 Top Cinematographer, Event Duration: 5 Hours per Day, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 100 copies Print: 4R (4”x6″) Matte Prints: 100 copies Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity, All photo & Video will be delivered by CD.'),
(3, 'All_in_One_Special_Customization', 57500, 'Stage: <br>\n1. Holu program Stage: Economy type<br>\n2. Reception Stage: Economy type<br>\n3. Photobooth<br>\n\nPhotography: <br>\n1. 1 Top Photographer (3 Days)<br>\nDetails: <br>\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\n\nCinematography:<br>\n1. 1 Top Cinematographer (1 Day)<br>\nDetails:<br>\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:<br>\n1. 1 pair with the light system (1 Day)<br>\n'),
(4, 'SP_02_897', 42000, 'Stage: <br>\r\n1. Holud program Stage: Economy type 2 Days<br>\r\n2. Photo booth<br>\r\nPhotography: <br>\r\n1. 1 Top Photographer (3 Days)<br>\r\nDetails: <br>\r\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\r\nCinematography:<br>\r\n1. 1 Top Cinematographer (1 Day)<br>\r\nDetails:<br>\r\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD. <br>\r\nSound System:<br>\r\n1. 1 pair with the light system (1 Day)<br>\r\nEntry Gate 1 day\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `confirmorder`
--

CREATE TABLE `confirmorder` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cus_order_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `event_date` date NOT NULL,
  `event_shift` varchar(50) DEFAULT NULL,
  `event_address` varchar(50) NOT NULL,
  `stage_catagory` varchar(100) NOT NULL,
  `stage_days` int(11) NOT NULL,
  `photo_catagory` varchar(100) NOT NULL,
  `photo_person` int(11) NOT NULL,
  `cine_catagory` varchar(100) NOT NULL,
  `cine_person` int(11) NOT NULL,
  `trailer_nember` int(11) NOT NULL,
  `f_v_number` int(11) NOT NULL,
  `delivery_by` varchar(20) NOT NULL,
  `sp_edit` int(11) NOT NULL,
  `n_edit` int(11) NOT NULL,
  `4r_print` int(11) NOT NULL,
  `5l_print` int(11) NOT NULL,
  `12l_print` int(11) NOT NULL,
  `16l_print` int(11) NOT NULL,
  `20l_print` int(11) NOT NULL,
  `memory_book` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirmorder`
--

INSERT INTO `confirmorder` (`id`, `customer_id`, `cus_order_id`, `event_name`, `package_name`, `price`, `details`, `event_date`, `event_shift`, `event_address`, `stage_catagory`, `stage_days`, `photo_catagory`, `photo_person`, `cine_catagory`, `cine_person`, `trailer_nember`, `f_v_number`, `delivery_by`, `sp_edit`, `n_edit`, `4r_print`, `5l_print`, `12l_print`, `16l_print`, `20l_print`, `memory_book`, `status`) VALUES
(45, 1, 39, 'Holdi Program', 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', '2021-05-18', '6.00 PM to 11.59 PM', '', '', 0, 'Slandered Photographer', 1, '', 0, 0, 0, 'Pen Drive', 0, 0, 0, 0, 0, 0, 0, 'Normal', 'Confirm'),
(46, 1, 40, 'Holdi Program', 'Standard_Cinema_1', 4500, 'Cinematographer: 1 Top Cinematographer, Event Duration: 4 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity.', '2021-05-13', '6.00 PM to 11.59 PM', '', '', 0, '', 0, 'Standard Cinematographer', 1, 1, 1, 'Pen Drive', 0, 0, 0, 0, 0, 0, 0, '', 'Confirm'),
(47, 1, 41, 'Holdi Program', 'Standard_1_Day_Combo', 9900, 'Photographer: 1 Top Photographer,\r\nCinematographer: 1 Top Cinematographer,\r\nEvent Duration: 5 Hours,\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies\r\nTrailer: 1 (2 - 2.30 minute Duration),\r\nBody: Depends on event activity,\r\n\r\nAll photo & Video will be delivered by CD.', '2021-05-13', '6.00 PM to 11.59 PM', '', '', 0, 'Slandered Photographer', 1, 'Standard Cinematographer', 1, 1, 1, 'CD', 100, 100, 100, 0, 0, 0, 0, 'Normal', 'Delivery on process'),
(48, 1, 42, 'Holdi Program', 'Standard_Photo_1', 6500, 'Photographer: 1 Top Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 4R (4”x6″) Matte,\r\nPrints: 100 copies.', '2021-05-20', '6.00 PM to 11.59 PM', '', '', 0, 'Slandered Photographer', 1, '', 0, 0, 0, 'Pen Drive', 0, 0, 100, 0, 0, 0, 0, 'Normal', 'Confirm'),
(49, 7, 43, 'Holdi Program', 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', '2021-05-18', '6.00 PM to 11.59 PM', 'Dhaka', '', 0, 'Senior Photographer', 1, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 'Complete'),
(50, 7, 43, 'Holdi Program', 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', '2021-05-18', '6.00 PM to 11.59 PM', '', '', 0, 'Junior Photographer', 1, '', 0, 0, 0, 'Pen Drive', 100, 200, 100, 0, 0, 0, 0, 'Normal', 'Complete'),
(51, 7, 44, 'Wedding Program', 'Standard_1_Day_Combo', 9900, 'Photographer: 1 Top Photographer,\r\nCinematographer: 1 Top Cinematographer,\r\nEvent Duration: 5 Hours,\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies\r\nTrailer: 1 (2 - 2.30 minute Duration),\r\nBody: Depends on event activity,\r\n\r\nAll photo & Video will be delivered by CD.', '2021-05-20', '6.00 PM to 11.59 PM', 'Jatrabari', '', 0, 'Senior Photographer', 1, 'Senior Cinematographer', 1, 1, 1, 'CD', 100, 200, 100, 0, 0, 0, 0, 'Normal', 'Complete'),
(52, 8, 46, 'Holdi Program', 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', '2021-09-22', '11 AM to 5.30 PM', 'Dhaka', '', 0, '', 2, '', 0, 0, 0, 'Pen Drive', 100, 150, 0, 0, 0, 0, 0, 'Normal', 'Complete'),
(53, 1, 47, '', 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', '0000-00-00', '', '', '', 0, 'Slandered Photographer', 2, '', 0, 0, 0, '', 100, 100, 0, 0, 0, 0, 0, '', 'Complete'),
(54, 9, 48, '', 'Standard_Photo_3', 12000, 'Photographer: 1 Senior Photographer with 1 Top Associate Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 12L (12\"x18″) Matte Print 1 copy,\r\nPrint: 5L (5\"x7.5″) Matte Prints 100 copies.', '0000-00-00', '', '', '', 0, 'Senior Photographer', 1, '', 0, 0, 0, '', -1, 0, 0, 0, 0, 0, 0, '', 'Delivery on process'),
(55, 9, 48, '', 'Standard_Photo_3', 12000, 'Photographer: 1 Senior Photographer with 1 Top Associate Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 12L (12\"x18″) Matte Print 1 copy,\r\nPrint: 5L (5\"x7.5″) Matte Prints 100 copies.', '0000-00-00', '', '', '', 0, 'Junior Photographer', 1, '', 2, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 'Delivery on process'),
(56, 9, 48, '', 'Standard_Photo_3', 12000, 'Photographer: 1 Senior Photographer with 1 Top Associate Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 12L (12\"x18″) Matte Print 1 copy,\r\nPrint: 5L (5\"x7.5″) Matte Prints 100 copies.', '0000-00-00', '', '', '', 0, '', 0, '', 0, 0, 0, '', 100, 200, 0, 100, 1, 0, 0, 'Normal', 'Delivery on process'),
(58, 10, 51, 'Wedding Program', 'All_in_One_Special_Customization', 57500, 'Stage: <br>\n1. Holud program Stage: Economy type\n2. Reception Stage: Economy type\n3. Photobooth\n\nPhotography: \n1. 1 Top Photographer (3 Days)\nDetails: \nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.\n\nCinematography:\n1. 1 Top Cinematographer (1 Day)\nDetails:\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:\n1. 1 pair with the light system (1 Day)\n', '2021-10-07', '6.00 PM to 11.59 PM', '', 'CAT - 05', 2, 'Senior Photographer', 1, 'Senior Cinematographer', 1, 1, 1, 'CD', 300, 0, 100, 0, 0, 0, 0, 'Normal', 'Complete'),
(59, 10, 52, 'Holdi Program', 'All_in_One_Special_Customization', 57500, 'Stage: <br>\n1. Holu program Stage: Economy type<br>\n2. Reception Stage: Economy type<br>\n3. Photobooth<br>\n\nPhotography: <br>\n1. 1 Top Photographer (3 Days)<br>\nDetails: <br>\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\n\nCinematography:<br>\n1. 1 Top Cinematographer (1 Day)<br>\nDetails:<br>\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:<br>\n1. 1 pair with the light system (1 Day)<br>\n', '2021-10-07', '6.00 PM to 11.59 PM', '', '', 0, '', 0, '', 2, 2, 2, '', 2, 2, 0, 0, 0, 0, 0, '', 'Complete'),
(60, 11, 53, 'Wedding Program', 'All_in_One_Special_Customization', 57500, 'Stage: <br>\n1. Holu program Stage: Economy type<br>\n2. Reception Stage: Economy type<br>\n3. Photobooth<br>\n\nPhotography: <br>\n1. 1 Top Photographer (3 Days)<br>\nDetails: <br>\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\n\nCinematography:<br>\n1. 1 Top Cinematographer (1 Day)<br>\nDetails:<br>\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:<br>\n1. 1 pair with the light system (1 Day)<br>\n', '2021-10-07', '6.00 PM to 11.59 PM', '', '', 0, '', 0, '', 0, 0, 0, 'CD', 0, 0, 0, 0, 0, 0, 0, '', 'Confirm'),
(61, 11, 54, 'Wedding Program', 'SP_02_897', 42000, 'Stage: <br>\r\n1. Holud program Stage: Economy type 2 Days<br>\r\n2. Photo booth<br>\r\nPhotography: <br>\r\n1. 1 Top Photographer (3 Days)<br>\r\nDetails: <br>\r\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\r\nCinematography:<br>\r\n1. 1 Top Cinematographer (1 Day)<br>\r\nDetails:<br>\r\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD. <br>\r\nSound System:<br>\r\n1. 1 pair with the light system (1 Day)<br>\r\nEntry Gate 1 day\r\n', '2021-10-07', '6.00 PM to 11.59 PM', '', 'Mehedi Stage Cat: 04', 2, 'Slandered Photographer', 1, 'Senior Cinematographer', 1, 1, 1, 'CD', 300, 300, 100, 0, 0, 0, 0, 'Normal', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `customerbooking`
--

CREATE TABLE `customerbooking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerbooking`
--

INSERT INTO `customerbooking` (`id`, `customer_id`, `package_name`, `price`, `details`, `status`) VALUES
(39, 1, 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', 'Confirm'),
(40, 1, 'Standard_Cinema_1', 4500, 'Cinematographer: 1 Top Cinematographer, Event Duration: 4 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity.', 'Confirm'),
(41, 1, 'Standard_1_Day_Combo', 9900, 'Photographer: 1 Top Photographer,\r\nCinematographer: 1 Top Cinematographer,\r\nEvent Duration: 5 Hours,\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies\r\nTrailer: 1 (2 - 2.30 minute Duration),\r\nBody: Depends on event activity,\r\n\r\nAll photo & Video will be delivered by CD.', 'Delivery on process'),
(42, 1, 'Standard_Photo_1', 6500, 'Photographer: 1 Top Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 4R (4”x6″) Matte,\r\nPrints: 100 copies.', 'Confirm'),
(43, 7, 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', 'Complete'),
(44, 7, 'Standard_1_Day_Combo', 9900, 'Photographer: 1 Top Photographer,\r\nCinematographer: 1 Top Cinematographer,\r\nEvent Duration: 5 Hours,\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies\r\nTrailer: 1 (2 - 2.30 minute Duration),\r\nBody: Depends on event activity,\r\n\r\nAll photo & Video will be delivered by CD.', 'Complete'),
(45, 1, 'Standard_Photo_1', 6500, 'Photographer: 1 Top Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 4R (4”x6″) Matte,\r\nPrints: 100 copies.', 'Pending'),
(46, 8, 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', 'Complete'),
(47, 1, 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies', 'Complete'),
(48, 9, 'Standard_Photo_3', 12000, 'Photographer: 1 Senior Photographer with 1 Top Associate Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 12L (12\"x18″) Matte Print 1 copy,\r\nPrint: 5L (5\"x7.5″) Matte Prints 100 copies.', 'Delivery on process'),
(49, 10, 'All in One, Special Customization', 57500, 'Stage: \n1. Holud program Stage: Economy type\n2. Reception Stage: Economy type\n3. Photobooth\n\nPhotography: \n1. 1 Top Photographer (3 Days)\nDetails: \nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.\n\nCinematography:\n1. 1 Top Cinematographer (1 Day)\nDetails:\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:\n1. 1 pair with the light system (1 Day)\n', 'Confirm'),
(50, 10, 'All_in_One_Special_Customization', 57500, 'Stage: \n1. Holud program Stage: Economy type\n2. Reception Stage: Economy type\n3. Photobooth\n\nPhotography: \n1. 1 Top Photographer (3 Days)\nDetails: \nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.\n\nCinematography:\n1. 1 Top Cinematographer (1 Day)\nDetails:\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:\n1. 1 pair with the light system (1 Day)\n', 'Confirm'),
(51, 10, 'All_in_One_Special_Customization', 57500, 'Stage: \n1. Holud program Stage: Economy type\n2. Reception Stage: Economy type\n3. Photobooth\n\nPhotography: \n1. 1 Top Photographer (3 Days)\nDetails: \nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.\n\nCinematography:\n1. 1 Top Cinematographer (1 Day)\nDetails:\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:\n1. 1 pair with the light system (1 Day)\n', 'Complete'),
(52, 10, 'All_in_One_Special_Customization', 57500, 'Stage: <br>\n1. Holu program Stage: Economy type<br>\n2. Reception Stage: Economy type<br>\n3. Photobooth<br>\n\nPhotography: <br>\n1. 1 Top Photographer (3 Days)<br>\nDetails: <br>\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\n\nCinematography:<br>\n1. 1 Top Cinematographer (1 Day)<br>\nDetails:<br>\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:<br>\n1. 1 pair with the light system (1 Day)<br>\n', 'Complete'),
(53, 11, 'All_in_One_Special_Customization', 57500, 'Stage: <br>\n1. Holu program Stage: Economy type<br>\n2. Reception Stage: Economy type<br>\n3. Photobooth<br>\n\nPhotography: <br>\n1. 1 Top Photographer (3 Days)<br>\nDetails: <br>\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\n\nCinematography:<br>\n1. 1 Top Cinematographer (1 Day)<br>\nDetails:<br>\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD.\n\nSound System:<br>\n1. 1 pair with the light system (1 Day)<br>\n', 'Confirm'),
(54, 11, 'SP_02_897', 42000, 'Stage: <br>\r\n1. Holud program Stage: Economy type 2 Days<br>\r\n2. Photo booth<br>\r\nPhotography: <br>\r\n1. 1 Top Photographer (3 Days)<br>\r\nDetails: <br>\r\nEvent Duration: 6 Hours, Number of Pictures: Unlimited (All post-processed) Specially Edited Photos: 300 copies Print: 4R (4”x6″) Matte Prints: 100 copies with Photo Album.<br>\r\nCinematography:<br>\r\n1. 1 Top Cinematographer (1 Day)<br>\r\nDetails:<br>\r\nEvent Duration: 5 Hours, Trailer: 1 (2 - 2.30 minute Duration), Body: Depends on event activity. trailer and body delivered by CD. <br>\r\nSound System:<br>\r\n1. 1 pair with the light system (1 Day)<br>\r\nEntry Gate 1 day\r\n', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `drone`
--

CREATE TABLE `drone` (
  `id` int(11) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drone`
--

INSERT INTO `drone` (`id`, `catagory`, `price`) VALUES
(3, 'Basic Drone Shoot', 7000),
(4, 'Super Drone Shoot', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `photography`
--

CREATE TABLE `photography` (
  `id` int(11) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photography`
--

INSERT INTO `photography` (`id`, `catagory`, `price`) VALUES
(20, 'Junior Photographer', 2500),
(21, 'Slandered Photographer', 3500),
(22, 'Senior Photographer', 4500),
(23, 'Super Photographer', 6000),
(24, '', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `photopackage`
--

CREATE TABLE `photopackage` (
  `id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photopackage`
--

INSERT INTO `photopackage` (`id`, `package_name`, `price`, `details`) VALUES
(1, 'Standard_Photo_1', 6500, 'Photographer: 1 Top Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 4R (4”x6″) Matte,\r\nPrints: 100 copies.'),
(2, 'Standard_Photo_2', 10000, 'Photographer: 1 Top Photographer with 1 Top Associate Photographer\r\nEvent Duration: 4 Hours\r\nNumber of Pictures: Unlimited (All post-processed)\r\nSpecially Edited Photos: 100 copies\r\nPrint: 4R (4”x6″) Matte Prints: 100 copies'),
(3, 'Standard_Photo_3', 12000, 'Photographer: 1 Senior Photographer with 1 Top Associate Photographer,\r\nEvent Duration: 4 Hours,\r\nNumber of Pictures: Unlimited (All post-processed),\r\nSpecially Edited Photos: 100 copies,\r\nPrint: 12L (12\"x18″) Matte Print 1 copy,\r\nPrint: 5L (5\"x7.5″) Matte Prints 100 copies.');

-- --------------------------------------------------------

--
-- Table structure for table `rawdata`
--

CREATE TABLE `rawdata` (
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawdata`
--

INSERT INTO `rawdata` (`order_id`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `sec_admin`
--

CREATE TABLE `sec_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `catagory`, `price`) VALUES
(2, 'Mehedi Stage Cat: 01', 3500),
(3, 'Mehedi Stage Cat: 02', 5000),
(4, 'Mehedi Stage Cat: 03', 12000),
(5, 'Mehedi Stage Cat: 04', 18000),
(6, 'Holdi Night Cat: 01', 7500),
(7, 'CAT - 04', 130000),
(8, 'CAT - 05', 120000),
(9, 'CAT - 06', 60000),
(10, 'CAT - 07', 30000),
(11, 'SP-CAT - 17', 155000),
(12, 'SP - 05', 10000),
(13, 'SP - 10', 20000),
(14, 'CAT - 08', 25000),
(15, 'CAT - 09', 20000),
(16, 'CAT - 10', 25000),
(17, 'CAT - 11', 20000),
(18, 'CAT - 12', 70000),
(19, 'CAT - 13', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `profile_pic` blob NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile`, `password`, `token`, `profile_pic`, `address`) VALUES
(1, 'SM Alvee', 'raisuddinalvee1@gmail.com', '01707066081', '16258383', '18ae369ce9d378116d08fef090b1c55ac1080eef6108b562c95486e82f7b4927e6ec19f0fe09c413350da5789d6bf496cce7', '', ''),
(3, 'test', 'test@ff.com', '123456', '123456', '259ab16e1da9cb653898472df7677a5ebff27095233af67e5a21fb9fb545a3ae7a5747bae2023aec68dc03f7b1bd2addc768', '', ''),
(5, 'tamima', 'rais35-1869@diu.edu.bd', '01634458960', '123', '80f2f7ae3404499f98553fb8d91a288b6d142417b0db2e3c19488c936ead9c9569335c84ba937b34ad9e48bf07702b625f1e', '', ''),
(6, 'raisuddinalvee', 'raisuddinalvee0@gmail.com', '9541984695198', '123456789', 'e734ce6fb71751c6316e10d5108f77caa827fb0a4ffc2bffa6cec3da67c98ae4356732a6f9fcfbb38bbcaa9579877c8bcaa5', '', ''),
(7, 'Ovishak', 'ovishakroy@gmail.com', '01644410396', '123456', 'e487e35efc2cf2ae30989eadd33386401218c34c660cb4ae3496630b3bd8f1e116b0684e38a7192b2a77455f179f37ebb913', '', ''),
(8, 'ABCD', 'abcd@gmail.com', '0123456789', '123456', '619929000eb9afbd0e6b7377bd87a55e9c204be01c3e6cfa62cd52363efe97f8e116552f9b4f05a49d85f05b22f9bdcf5179', '', ''),
(9, 'Mithu', 'mithu@gmail.com', '123456789', '123456', '73a5ed2e9ff5839d7a391928ab70db9f1264ea2cd6cb75993df064ef6f16172109ec48d48e4ac333ba51d0192e7590c9f456', '', ''),
(10, 'test', 'test@gmail.com', '0123456', '123456', 'ebcd80493a8742e69816a47b2d2d7efc1c1815335fcb3839415bf923f0752584a5ce8cf65c7005e9a829025f6586b100b43b', '', ''),
(11, 'Md. Nayem', 'nayemdemra01@gmail.com', '01889772293', '123456', '6edfac190f73eab66edff6bc7463b4682e6a3a4758e24e31434940af536647d6a8c986c6fdf900630b4d8dcb140d904cb137', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinematography`
--
ALTER TABLE `cinematography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinepackage`
--
ALTER TABLE `cinepackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combopackage`
--
ALTER TABLE `combopackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmorder`
--
ALTER TABLE `confirmorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerbooking`
--
ALTER TABLE `customerbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drone`
--
ALTER TABLE `drone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photography`
--
ALTER TABLE `photography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photopackage`
--
ALTER TABLE `photopackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_admin`
--
ALTER TABLE `sec_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cinematography`
--
ALTER TABLE `cinematography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cinepackage`
--
ALTER TABLE `cinepackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `combopackage`
--
ALTER TABLE `combopackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirmorder`
--
ALTER TABLE `confirmorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `customerbooking`
--
ALTER TABLE `customerbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `drone`
--
ALTER TABLE `drone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photography`
--
ALTER TABLE `photography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `photopackage`
--
ALTER TABLE `photopackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sec_admin`
--
ALTER TABLE `sec_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
