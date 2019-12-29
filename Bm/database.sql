-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 12:44 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bm`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `data` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `data`) VALUES
(1, '', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; -webkit-font-smoothing: antialiased; padding: 20px; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>\r\n\r\n<h2 style=\"box-sizing: border-box; margin: 0px 0px 15px; font-family: Rubik, sans-serif; line-height: 38px; color: red; font-size: 28px; padding: 0px 0px 0px 21px;\">What makes Bharatiya matrimony Different?</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</span></p>\r\n\r\n<h2 style=\"line-height: 38px; box-sizing: border-box; margin: 0px 0px 15px; font-family: Rubik, sans-serif; color: red; font-size: 28px; padding: 0px 0px 0px 21px;\">Why choose Bharatiya matrimony ?</h2>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; -webkit-font-smoothing: antialiased; padding: 20px; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">&#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)..</p>\r\n\r\n<h2 style=\"box-sizing: border-box; margin: 0px 0px 15px; font-family: Rubik, sans-serif; line-height: 38px; color: red; font-size: 28px; padding: 0px 0px 0px 21px;\">Five points of Authentication</h2>\r\n\r\n<p class=\"p1\" style=\"box-sizing: border-box; margin: 0px; -webkit-font-smoothing: antialiased; padding: 13px 0px;\">To ensure the genuineness and authentication of profiles we have created this process.</p>\r\n\r\n<ul class=\"list-1\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; -webkit-font-smoothing: antialiased; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">dummy text of the printing and typesetting</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">Phone number verification</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">Email id verification</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">Verifying information from Facebook profile</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">Verifying education and other details from Linked In profile</li>\r\n</ul>\r\n\r\n<h2 style=\"box-sizing: border-box; margin: 0px 0px 15px; font-family: Rubik, sans-serif; line-height: 38px; color: red; font-size: 28px; padding: 0px 0px 0px 21px;\">How this process is useful?</h2>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; -webkit-font-smoothing: antialiased; padding: 20px; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<h2 style=\"box-sizing: border-box; margin: 0px 0px 15px; font-family: Rubik, sans-serif; line-height: 38px; color: red; font-size: 28px; padding: 0px 0px 0px 21px;\">Wider &amp; Better Search Options</h2>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; -webkit-font-smoothing: antialiased; padding: 20px; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">We serve to all Indian communities in India and abroad with prime focus on USA, Canada, UK, Australia and Singapore. In a short-span of time, we have become the first choice of all Indian communities to search the perfect life partner with ease. This is one of the best platforms to search and connect with the special someone.</p>\r\n\r\n<h2 style=\"box-sizing: border-box; margin: 0px 0px 15px; font-family: Rubik, sans-serif; line-height: 38px; color: red; font-size: 28px; padding: 0px 0px 0px 21px;\">LoveVivah helps you better</h2>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; -webkit-font-smoothing: antialiased; padding: 20px; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p class=\"p1\" style=\"box-sizing: border-box; margin: 0px; -webkit-font-smoothing: antialiased; padding: 13px 0px;\">To ensure the genuineness and authentication of profiles we have created this process.</p>\r\n\r\n<ul class=\"list-1\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; -webkit-font-smoothing: antialiased; color: rgb(111, 109, 114); font-family: Rubik, sans-serif; font-size: 16px;\">\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">We understand your requirements and try to meet your criteria from the Day 1.</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">We provide completely personalized service to our customers.</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">We offer seamless experience through our user friendly interface and features that can help you to manage your profile with ease.</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">Verifying information from Facebook profile</li>\r\n	<li style=\"box-sizing: border-box; list-style: decimal; padding: 6px;\">Verifying education and other details from Linked In profile</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 2,
  `status` int(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `referral` varchar(1000) DEFAULT NULL,
  `ref` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `picture`, `role`, `status`, `remember_token`, `permission`, `created_at`, `phone`, `referral`, `ref`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$f5rGmZ/TL9zLyXDmkVMlJ.Hi9ivBr7MEZdvG0yYjKFnNk3/a32X1K', '1495188244-88226.jpg', 1, 1, 'APvIYnYJfD81q7lP4WIQDpRYrYpM0cQlaDFk5ehabfifjqoPPe0fQsL50Ipo', NULL, '0000-00-00 00:00:00', '', '123', ''),
(2, 'kp', 'oakbells@gmail.com', '$2y$10$jqMKJuwI/dEooZkID00lLOQpAkjK5bCvHTpG.3gvRiimUoHJT1RYW', '1785714114006_1068334999940137_1979487850_o.jpg', 1, 1, 'fewsZexHHKC1iPpLPgiXA5rBbomQK9jnjpGNrAaXid78Z46hp6kEx2q3X52F', 'null', '2018-08-21 09:00:30', '', '1234', ''),
(5, 'Gk', 'gk@gmail.com', '$2y$10$jD3s7WwTMWQRxEpj3ER8xuqiUqqkNwSseWw0X1Ot9tGVQ4i1yMwfq', NULL, 2, 1, 'pjVFpA8IY4Rl3y8XnQyXWvMSlEDW3V3WTDyB6fEgWJBgl4JXz3a2mINsqhCK', '2,3,4,5,6,7,8,9', '0000-00-00 00:00:00', '1234567890', '12345', ''),
(6, 'subadmin1', 'sub1@test.com', '$2y$10$6.LvYoKPkb1NHzyYOpc3IOrEwAPCJJ.C.mrU7MpnHDXiovEZLYivC', NULL, 2, 1, NULL, '2,3,4,6,7,8', '0000-00-00 00:00:00', '989898989', '123456', ''),
(7, 'test subadmin', 'tes@tes.com', '$2y$10$M9npW978alc6ejmJIFhw.uDS2NCEEmUD/pxHaSaw1JQGsOmHfKwmO', NULL, 2, 1, NULL, '2', '0000-00-00 00:00:00', '1234567890', 'LV7RG', ''),
(8, 'testsubadmin1', 'testsubadmin1@test.com', '$2y$10$fYilh2tAEIBWQ3WI5r/ue.XPbChkKqHK8ellK4UA4Mm9KKxJP45GG', NULL, 2, 1, 'Uqk5YemKLns7zpXrNLDZ7rxaDVz3RMBwCfUPnbhVpkJUN5hAWfAUyVWY1j9g', '2', '0000-00-00 00:00:00', '1234567890', 'BQLP9', '');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `text`, `image`) VALUES
(1, 'Marriage ', 'Testing Data', '49984.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `image`, `status`, `create_date`) VALUES
(1, '<p>tretr</p>\r\n', '23199720b.jpg', 1, '2019-04-05 06:21:42'),
(2, '<p>rdgfdg</p>\r\n', '61533apparel.jpg', 1, '2019-04-05 06:30:33'),
(3, '<p>dsfsdf</p>\r\n', '89643apparel.jpg', 1, '2019-04-05 06:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `testimoniyal`
--

CREATE TABLE `testimoniyal` (
  `id` int(11) NOT NULL,
  `titile` varchar(1000) DEFAULT NULL,
  `designation` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoniyal`
--

INSERT INTO `testimoniyal` (`id`, `titile`, `designation`, `description`, `image`, `status`, `create_date`, `location`) VALUES
(4, 'Amar Jeet Review', 'Membership', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">orem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets&nbsp;</span></p>\r\n', NULL, 1, '2019-04-12 08:24:04', 'Ahmedabad'),
(5, 'Sonali Reviews', 'Relationship ', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets&nbsp;</span></p>\r\n', NULL, 1, '2019-04-12 08:23:35', 'Ahmedabad'),
(6, 'Jeet Reviews ', 'Venue ', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets&nbsp;</span></p>\r\n', NULL, 1, '2019-04-12 08:23:11', 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(1000) DEFAULT '-',
  `lname` varchar(1000) DEFAULT '-',
  `email` varchar(1000) DEFAULT '-',
  `phone` varchar(1000) DEFAULT '',
  `profile` varchar(1000) DEFAULT '-',
  `password` varchar(1000) DEFAULT '-',
  `gender` varchar(1000) DEFAULT '-',
  `dob` varchar(1000) DEFAULT '-',
  `country` varchar(1000) DEFAULT '-',
  `city` varchar(1000) NOT NULL DEFAULT '-',
  `state` varchar(1000) NOT NULL DEFAULT '-',
  `pin` varchar(1000) NOT NULL DEFAULT '-',
  `religion` varchar(1000) DEFAULT '-',
  `MotherTongue` varchar(1000) DEFAULT '-',
  `complexion` varchar(1000) NOT NULL DEFAULT '-',
  `about` varchar(1000) DEFAULT '-',
  `Height` varchar(1000) DEFAULT '-',
  `Marital_Status` varchar(1000) DEFAULT '-',
  `Caste` varchar(1000) DEFAULT '-',
  `subcaste` varchar(1000) NOT NULL DEFAULT '-',
  `Manglik` varchar(1000) DEFAULT '-',
  `Special_Cases` varchar(1000) DEFAULT '-',
  `Gotra` varchar(1000) DEFAULT '-',
  `Time_of_Birth` varchar(1000) DEFAULT '-',
  `Place_of_Birth` varchar(1000) DEFAULT '-',
  `smoker` varchar(1000) DEFAULT '-',
  `alcohol` varchar(1000) DEFAULT '-',
  `Diet` varchar(1000) DEFAULT '-',
  `Educational` varchar(1000) DEFAULT '-',
  `College` varchar(1000) DEFAULT '-',
  `Working` varchar(1000) DEFAULT '-',
  `Working_As` varchar(1000) DEFAULT '-',
  `Income` varchar(1000) DEFAULT '-',
  `facebook` varchar(1000) DEFAULT '-',
  `google` varchar(1000) DEFAULT '-',
  `addhr` varchar(1000) DEFAULT '-',
  `pencard` varchar(1000) DEFAULT '-',
  `Father_Occupation` varchar(1000) NOT NULL DEFAULT '-',
  `Mother_Occupation` varchar(1000) NOT NULL DEFAULT '-',
  `Family_Status` varchar(1000) NOT NULL DEFAULT '-',
  `About_Family` varchar(1000) NOT NULL DEFAULT '-',
  `sister` varchar(1000) NOT NULL DEFAULT '-',
  `married_sister` varchar(255) NOT NULL DEFAULT '-',
  `unmarried_sister` varchar(255) NOT NULL DEFAULT '-',
  `Brother` varchar(1000) NOT NULL DEFAULT '-',
  `married_brother` varchar(255) NOT NULL DEFAULT '-',
  `unmarried_brother` varchar(255) NOT NULL DEFAULT '-',
  `Native_Country` varchar(1000) NOT NULL DEFAULT '-',
  `Native_State` varchar(1000) NOT NULL DEFAULT '-',
  `Family_Value` varchar(1000) NOT NULL DEFAULT '-',
  `afflence_level` varchar(255) DEFAULT '-',
  `area` varchar(255) NOT NULL DEFAULT '-',
  `annual_income` varchar(255) NOT NULL DEFAULT '-',
  `address1` varchar(1000) NOT NULL DEFAULT '-',
  `address2` varchar(1000) NOT NULL DEFAULT '-',
  `agefrom` varchar(1000) NOT NULL DEFAULT '-',
  `professional_goals` varchar(1000) NOT NULL DEFAULT '-',
  `criminal_records` varchar(100) NOT NULL DEFAULT '-',
  `status` int(11) NOT NULL DEFAULT 1,
  `verfiy` int(11) NOT NULL DEFAULT 0,
  `image` varchar(1000) DEFAULT NULL,
  `package` int(11) NOT NULL DEFAULT 1,
  `ref` varchar(1000) NOT NULL,
  `referral` varchar(1000) DEFAULT '-',
  `point` int(11) NOT NULL,
  `sub_cast` varchar(1000) NOT NULL DEFAULT '-',
  `area/fields` varchar(1000) NOT NULL DEFAULT '-',
  `personal_goals` varchar(1000) NOT NULL DEFAULT '-',
  `criminal_record` varchar(1000) NOT NULL DEFAULT '-',
  `zip_code` varchar(1000) NOT NULL DEFAULT '-',
  `unmarried_brothers` varchar(1000) NOT NULL DEFAULT '-',
  `married_brothers` varchar(1000) NOT NULL DEFAULT '-',
  `trust_score` int(11) DEFAULT 0,
  `profile_com` int(11) NOT NULL DEFAULT 0,
  `user_account` int(11) NOT NULL DEFAULT 0,
  `age` varchar(1000) NOT NULL,
  `photo_status` int(11) NOT NULL DEFAULT 1,
  `profile_setting` int(11) NOT NULL DEFAULT 1,
  `contact_statting` int(11) NOT NULL DEFAULT 1,
  `email_` int(11) NOT NULL DEFAULT 1,
  `having_kids` varchar(1000) NOT NULL DEFAULT '-',
  `living_with_me` varchar(1000) NOT NULL DEFAULT '-',
  `login_status` int(11) NOT NULL DEFAULT 0,
  `verfy_photo` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `profile`, `password`, `gender`, `dob`, `country`, `city`, `state`, `pin`, `religion`, `MotherTongue`, `complexion`, `about`, `Height`, `Marital_Status`, `Caste`, `subcaste`, `Manglik`, `Special_Cases`, `Gotra`, `Time_of_Birth`, `Place_of_Birth`, `smoker`, `alcohol`, `Diet`, `Educational`, `College`, `Working`, `Working_As`, `Income`, `facebook`, `google`, `addhr`, `pencard`, `Father_Occupation`, `Mother_Occupation`, `Family_Status`, `About_Family`, `sister`, `married_sister`, `unmarried_sister`, `Brother`, `married_brother`, `unmarried_brother`, `Native_Country`, `Native_State`, `Family_Value`, `afflence_level`, `area`, `annual_income`, `address1`, `address2`, `agefrom`, `professional_goals`, `criminal_records`, `status`, `verfiy`, `image`, `package`, `ref`, `referral`, `point`, `sub_cast`, `area/fields`, `personal_goals`, `criminal_record`, `zip_code`, `unmarried_brothers`, `married_brothers`, `trust_score`, `profile_com`, `user_account`, `age`, `photo_status`, `profile_setting`, `contact_statting`, `email_`, `having_kids`, `living_with_me`, `login_status`, `verfy_photo`) VALUES
(1, 'vikash', 'kumar', 'oakbells@gmail.com', '7689867325', 'Self', '123', 'Male', '2019-07-17', '', '', '', '', 'Hindu', 'Assamese', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 1, 0, NULL, 1, '', 'OE51B', 0, '-', '-', '-', '-', '-', '-', '-', 0, 0, 0, '', 1, 1, 1, 1, '-', '-', 0, 0),
(2, 'Mohammad', 'Asif', 'mdasif38@gmail.com', '873894172', 'Self', '12345', 'Male', '1995-12-21', '', '', '', '', 'Muslim', 'Arabic', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 1, 0, NULL, 1, '', 'UC3NF', 0, '-', '-', '-', '-', '-', '-', '-', 0, 0, 0, '', 1, 1, 1, 1, '-', '-', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `pincode` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `short` varchar(1000) NOT NULL,
  `dis` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `title`, `location`, `city`, `pincode`, `image`, `short`, `dis`, `date`, `status`) VALUES
(12, 'Relations Made By Us', 'Jaipur, Rajasthan, India', 'Jaipur', '', '42193.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">I always wanted an understanding life partner who would understand me and respect my profession</span></p>\r\n', '', '2019-04-12 07:27:41', 1),
(7, 'Teena And Rajat', 'Jaipur, Rajasthan, India', 'Jaipur', '', '21802.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">We had a seamless experience finding a perfect girl for Pawan. We opted for personalized&nbsp;</span></p>\r\n', '', '2019-04-12 06:42:40', 1),
(6, 'Shahid and Kareena', 'Jaipur, Rajasthan, India', 'Jaipur', '', '24953.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">We had a seamless experience finding a perfect girl for Pawan. We opted for personalized&nbsp;</span></p>\r\n', '', '2019-04-12 06:43:46', 1),
(8, 'Krati And Vasu', 'Jaipur, Rajasthan, India', 'Jaipur', '', '62936.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">We had a seamless experience finding a perfect girl for Pawan. We opted for personalized&nbsp;</span></p>\r\n', '', '2019-04-12 06:41:06', 1),
(9, 'Raj Kumar And Priya', 'Jaipur, Rajasthan, India', 'Jaipur', '', '4743.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">We had a seamless experience finding a perfect girl for Pawan. We opted for personalized&nbsp;</span></p>\r\n', '', '2019-04-12 06:39:37', 1),
(10, 'Divya And Sitaram', 'Delhi ', '', '', '3699.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">I registered at LoveVivah.com four months back and shared my interest with a few preferred profiles</span></p>\r\n', '', '2019-04-12 06:37:17', 1),
(11, 'Pooja and Gagan Deep', 'Jaipur, Rajasthan, India', 'Jaipur', '', '61666.jpg', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">We would like to thank LoveVivah.com for their efforts in organizing the most compatible match. We a...We would like to thank LoveVivah.com for their efforts in organizing the most compatible match.</span></p>\r\n', '', '2019-04-12 06:34:43', 1),
(14, 'matrimony', 'matches made by us', '', '', '84823.png', '<p>we match better</p>\r\n', '<p>this is match</p>\r\n', '2019-06-06 04:31:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `couple` varchar(1000) DEFAULT NULL,
  `des` text NOT NULL,
  `wed_date` varchar(1000) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `title`, `couple`, `des`, `wed_date`, `location`, `image`, `status`) VALUES
(12, 'Wedding At Paris', 'Jeet and Gangan', '<p><span open=\"\" style=\"color: rgb(92, 92, 92); font-family: \" text-align:=\"\">I always wanted an understanding life partner who would understand me and respect my profession</span></p>\r\n', '2019-04-03', 'jaipur', '37630.jpeg', 1),
(13, 'bharatiy', 'matrimony', '<p>our matches</p>\r\n', '1999-11-11', 'pune', '810.jpg', 1),
(11, 'Taj Wedding ', 'Seema And Arjun', '<p><span open=\"\" style=\"color: rgb(92, 92, 92); font-family: \" text-align:=\"\">I always wanted an understanding life partner who would understand me and respect my profession</span></p>\r\n', '2019-04-08', 'rajgarh', '81506.jpg', 1),
(10, 'Couples Made By Us', 'Heena And Rajesh', '<p><span style=\"color: rgb(92, 92, 92); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center;\">I always wanted an understanding life partner who would understand me and respect my profession</span></p>\r\n', '2019-04-11', 'jaipur', '61947.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoniyal`
--
ALTER TABLE `testimoniyal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimoniyal`
--
ALTER TABLE `testimoniyal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
