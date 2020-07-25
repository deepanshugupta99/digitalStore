-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 11:40 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocese`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_category`
--

CREATE TABLE `all_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_category`
--

INSERT INTO `all_category` (`cat_id`, `cat_name`) VALUES
(1, 'Cooking Essentials'),
(2, 'Packaged Foods'),
(3, 'Household Supplies'),
(4, 'Beauty & Grooming'),
(5, 'Baby Products');

-- --------------------------------------------------------

--
-- Table structure for table `all_s_cat`
--

CREATE TABLE `all_s_cat` (
  `cat_id` int(11) NOT NULL,
  `s_cat_id` int(11) NOT NULL,
  `s_cat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_s_cat`
--

INSERT INTO `all_s_cat` (`cat_id`, `s_cat_id`, `s_cat_name`) VALUES
(1, 1, 'Atta & Flour'),
(1, 2, 'Dals & Pulses'),
(1, 3, 'Rice'),
(1, 4, 'Oil & Ghee'),
(1, 5, 'Sugar'),
(1, 6, 'Suji & other Flours'),
(1, 7, 'Spices, Masala & Salts'),
(1, 8, 'Dry Fruits'),
(2, 9, 'Biscuits & Cookies'),
(2, 10, 'Jams, Spreads & Honey'),
(2, 11, 'Noodles'),
(2, 12, 'Pasta & Soups'),
(2, 13, 'Sauces & Ketchups'),
(2, 14, 'ReadyMeals & Mixes'),
(2, 15, 'Pickels & Chutneys'),
(2, 16, 'Disgestive'),
(3, 17, 'Detergents'),
(3, 18, 'Household Cleaning'),
(3, 19, 'Dish Washing'),
(3, 20, 'Fabric Care'),
(3, 21, 'Air Freshners'),
(3, 22, 'Batteries'),
(3, 23, 'Paper, Towels & Tissues'),
(3, 24, 'Cleaning Supplies'),
(4, 25, 'Soaps'),
(4, 26, 'Shampoos'),
(4, 27, 'Deodorants'),
(4, 28, 'Hair Oil'),
(4, 29, 'Body Wash'),
(4, 30, 'Conditioners'),
(4, 31, 'Talcum Powder'),
(4, 32, 'Hair Styling'),
(5, 33, 'Diapers'),
(5, 34, 'Wipes'),
(5, 35, 'Baby Care'),
(5, 36, 'Baby Food');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`) VALUES
(1, 'abhay khand'),
(2, 'ankur vihar'),
(3, 'ahinsa khand-1'),
(4, 'ansal\'s chiranjiv vihar'),
(5, 'ahinsa khand-2'),
(6, 'avantika'),
(7, 'ambedkar road'),
(8, 'bhim nagar'),
(9, 'bhram puri'),
(10, 'bhuapur'),
(11, 'chander nagar'),
(12, 'chaudharymore'),
(13, 'crossings republic road'),
(14, 'dundahera'),
(15, 'dasna'),
(16, 'govindpuram'),
(17, 'gandhi nagar'),
(18, 'gyan khand-3'),
(19, 'gt road'),
(20, 'gyan khand-1'),
(21, 'gyan khand-2'),
(22, 'gyan khand-4'),
(23, 'harbans nagar'),
(24, 'harsaon'),
(25, 'kamla nehru nagar'),
(26, 'kaushambi'),
(27, 'kavi nagar'),
(28, 'lajpat nagar'),
(29, 'lal kuan'),
(30, 'lohia nagar'),
(31, 'loni'),
(32, 'madhopura'),
(33, 'marium nagar'),
(34, 'madhuban bapudham'),
(35, 'model town'),
(36, 'maliwara'),
(37, 'mohan nagar'),
(38, 'murad nagar'),
(39, 'nandgram'),
(40, ' nehru nagar'),
(41, 'niti khand-1'),
(42, 'niti khand-2'),
(43, 'niti khand-3'),
(44, 'nyay khand-1'),
(45, 'nyay khand-2'),
(46, 'naya ganj'),
(47, 'neelmani colony'),
(48, 'nh-58'),
(49, 'panchsheel enclave'),
(50, 'pandav nagar industrial area'),
(51, 'patel nagar'),
(52, 'pratap vihar'),
(53, 'ramprastha'),
(54, 'raispur'),
(55, 'raj nagar'),
(56, 'raj nagar extension'),
(57, 'sadiqpur'),
(58, 'sewa nagar'),
(59, ' shakti khand-1'),
(60, 'shakti khand-2'),
(61, 'shakti khand-3'),
(62, 'shakti khand-4'),
(63, 'shalimar garden extension'),
(64, 'surya nagar'),
(65, 'shaibabad'),
(66, 'shahpur bamheta'),
(67, 'shastri nagar'),
(68, 'swaran jyanti puram'),
(69, 'sanjay nagar'),
(70, 'shalimar garden'),
(71, 'shatabdipuram'),
(72, 'sehani khurd'),
(73, 'shalimar garden extension-1'),
(74, 'vivekanand nagar'),
(75, 'vaishali'),
(76, 'vasundhara'),
(77, 'vijay nagar'),
(78, 'vaibhav khand'),
(79, 'vaishali extension'),
(80, 'daulatpura'),
(81, ' nasirpur');

-- --------------------------------------------------------

--
-- Table structure for table `billing_adddress`
--

CREATE TABLE `billing_adddress` (
  `address_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'LG'),
(2, 'Redmi'),
(3, 'Real me');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `m_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `scat_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `shopno` varchar(20) NOT NULL,
  `block` varchar(20) NOT NULL,
  `sector` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`m_id`, `b_id`, `business_name`, `desc`, `contact`, `email`, `website`, `category_id`, `scat_id`, `area_id`, `shopno`, `block`, `sector`) VALUES
(121, 124, 'DGCART', 'Very good company', 9654765835, 'deepanshugupta717@gmail.com', 'http://www.dgcart.ml', 1, 1, 1, '12', 'b', '23'),
(127, 125, 'ABCD', 'oyftdculkhgfdtrskutllfudorlutiyfd3ex6tdfh', 5376576897, 'GFGFGF@GMAIL.COM', '', 1, 1, 1, 't', 'tur', '5'),
(128, 126, 'Abcd', 'Gsgsgsgsgsgsgeggegwg', 5352526266, 'gsgs@gmail.com', '', 1, 1, 1, 'Tw', 'Gs', 'Wg'),
(129, 127, 'Aman Pvt Ltd', 'kjhftdlitdlutelutdt.du', 4875657546, 'tud@gmail.com', '', 1, 1, 1, 'y', 'yf', 'uo'),
(131, 128, 'iyrtu', 'gyifcljgv.vct8dutckyfl8eutf.jtdlutdtfttury', 5768798654, '75@gmail.com', '', 1, 1, 1, 'i6ro', 'tr', '86'),
(126, 129, 'yliygf', 'gdke5ektrcx5ettex57edfc5xdrygg6co5rgfgg86ctd gfi7f68c5r cy', 8765435465, '68r@ghg.com', '', 1, 1, 1, 'v', 'y', 'yi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_review`
--

CREATE TABLE `delivery_review` (
  `uid` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `alt_contact` bigint(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`m_id`, `m_name`, `email`, `password`, `contact`, `alt_contact`) VALUES
(121, 'Deepanshu Gupta', 'deepanshugupta@gmail.com', 'password', 9654765835, 0),
(122, 'Mangat Pal', 'palhemant76@gmail.com', '8800672246', 9717280947, 0),
(123, 'deba beta', 'deba@gmail.com', 'password', 5765436587, 0),
(124, 'gfugj yfgyu', 'admin@gmail.com', 'password', 4685875435, 0),
(125, 'gfdyhgnv fgbng', 'deepanshu1@gmail.com', 'password', 4635878658, 0),
(126, 'gyfugj tdyghjyi', 'password@gmail.com', 'password', 4865589879, 0),
(127, 'yyrtdr gjf', '1@gmail.com', 'password', 6453865764, 0),
(128, 'Deepanshu Tywtw', '2@gmail.com', 'password', 6366363636, 0),
(129, 'abcd gupta', 'abcd@gmail.com', 'password', 5765845746, 0),
(130, 'Gzgzgz Gzgsv', 'ggg@gsggs', 'ysgsgsgsg', 6363636366, 0),
(131, 'itfdyf iuytrso', 'itfu2gyorygyig@9tyg', '68875687', 8765858685, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_confirmed`
--

CREATE TABLE `order_confirmed` (
  `o_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `o_id` int(11) NOT NULL,
  `recieved` int(11) NOT NULL,
  `shipped` int(11) NOT NULL,
  `delivered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(30) NOT NULL,
  `b_id` int(30) NOT NULL,
  `pname` varchar(80) NOT NULL,
  `mrp` int(20) NOT NULL,
  `selling_price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `s_cat_id` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `pdesc` varchar(500) NOT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `img2` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `b_id`, `pname`, `mrp`, `selling_price`, `quantity`, `category`, `s_cat_id`, `brand`, `pdesc`, `img1`, `img2`) VALUES
(1, 1, 'Mini Gun', 300, 299, 0, '1', 1, '', 'AbcdefghijklmnopqrstuvwxyzAbcdefghijklmnopqrstuvwxyzAbcdefghijklmnopqrstuvwxyzAbcdefghijklmnopqrstuvwxyzAbcdefghijklmnopqrstuvwxyzAbcdefghijklmnopqrstuvwxyz', '', ''),
(5, 122, 'Mi note 4', 11000, 6000, 0, '1', 2, '2', 'abaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahgabaahg', 'Screenshot (1).png', 'Screenshot (2).png'),
(6, 122, 'Mi note 5 pro', 14000, 10000, 0, '1', 3, '2', 'uyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuyuyifvliugyvtcyghjbkuy', 'Screenshot (5).png', 'Screenshot (6).png'),
(7, 123, 'Laptop', 67665, 67600, 0, '2', 9, '', 'cfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfhgcfhgtdghjgyurfh', '15590886_229689914123898_7696347444090674459_o.jpg', 'Screenshot (1).png'),
(8, 124, 'LED Tv', 39000, 36000, 5, '2', 10, '1', 'very good Tv', '', ''),
(9, 124, 'ac', 32000, 30000, 0, '2', 11, '', 'ygli', 'Screenshot (1).png', 'Screenshot (3).png'),
(10, 124, 'ac', 32000, 30000, 0, '2', 12, '', 'ygli', '', ''),
(11, 124, 'jg', 6876, 866, 0, '2', 13, '', '86r9tfugbhj', 'Screenshot (2).png', 'Screenshot (1).png'),
(12, 124, 'jg', 6876, 866, 0, '3', 17, '', '86r9tfugbhj', '', ''),
(13, 124, 'Redmi 4`', 10000, 9000, 4, '3', 18, '2', 'tdrygjgvj', 'Screenshot (1).png', 'Screenshot (2).png'),
(14, 124, 'Ac', 38000, 35000, 88, '3', 19, '1', 'uyhjkglj', '', ''),
(15, 124, 'ou', 68, 86, 86, '3', 20, '0', 'yigfhtiyfhk', 'Screenshot (1).png', 'Screenshot (2).png'),
(16, 124, 'New2', 5000, 4000, 50, '10', 0, '3', 'Ggsvsvwvevvsshshebd', '1540840674785677405584.jpg', '1540840690948215871510.jpg'),
(17, 125, 'ffufcjfc', 756856, 765465768, 574, '10', 0, '2', 'douflidlutdutdlutsyrslutd', 'Screenshot (1).png', 'Screenshot (2).png'),
(18, 126, 'Iphone x', 124000, 123000, 20, '10', 0, '1', 'Gggzgsvvsvsvsvwbwbww', 'IMG-20181101-WA0003.jpg', 'IMG-20181101-WA0002.jpg'),
(19, 127, 'vfiygcj', 57685768, 68, 56, '10', 0, '2', 'kjvi;kflutduldutdlu5edtufit', 'Screenshot (6).png', 'Screenshot (3).png'),
(20, 127, 'fttuft', 75, 57, 5, '10', 0, '1', 'kg9fyf;tddlutlduelutd5e5tue5e588ii6d5d', 'Screenshot (6).png', 'Screenshot (7).png'),
(21, 127, 'jhgyih', 7568565, 465, 85, '10', 0, '1', 'gfot7doliykg;6fodi364ekyrjgfig96', 'Screenshot (8).png', 'Screenshot (7).png'),
(22, 127, '68tuiugily', 66, 6, 6, '10', 0, '1', 'b;iyfilykhv57rskxyhgjuftd', 'Screenshot (2).png', 'Screenshot (1).png'),
(23, 127, 'ug8t', 867, 68, 765, '10', 0, '1', 'u76r7tujhgjh6g57ryfhgg76r', 'Screenshot (1).png', 'Screenshot (1).png'),
(24, 127, 'ft8hg', 67867, 766897, 68, '0', 0, '1', 'hgytugjut68d7otjhh876587ugj', 'Screenshot (1).png', 'Screenshot (1).png'),
(25, 127, 'yyi', 687, 768, 86, '10', 0, '1', '87tujfyujykgfuiyuiykgvyfrutiuk', 'Screenshot (1).png', 'Screenshot (1).png'),
(27, 128, 'Aman Pilla', 500, 1, 2, '10', 0, '1', 'Ye ek pilla h jo bhut hi bekar h.', 'Screenshot (4).png', 'Screenshot (2).png'),
(28, 129, 'ljuy', 86, 685786, 68, '10', 0, '1', 'vhcdgnv6857ryfhgmn,mh7g68', 'Screenshot (5).png', 'Screenshot (6).png'),
(29, 124, 'mi note 4', 12245, 4364, 5, '10', 0, '2', 'iytr7dygjkg875togljhvkf857r', 'Screenshot (4).png', 'Screenshot (5).png');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `uid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `contact` bigint(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `uname`, `date`, `contact`) VALUES
(1, 'deepanshugupta@gmail.com', 'password', 'Deepanshu Gupta', '2018-10-30', 1234567890),
(2, 'aman@gmail.com', 'password', 'aman gupta', '2018-10-29', 4675687896),
(3, 'debu@gmail.com', 'password', 'debu beta', '2018-10-29', 4657689809),
(4, 'amangupta717@gmail.com', 'abcdef', 'Aman Sir', '2018-10-29', 5256262626),
(5, '76894@gmail.com', 'tufolg', 'ugyf tuf', '2018-10-31', 5879687685),
(6, 'ysyw@gmail.com', 'hdgdgdh', 'Twyyw Ysysy', '2018-10-31', 6363636363),
(7, 'ysydydy@gsggs', 'sbhdhdgdgdg', 'Gsgsg Ysysys', '2018-11-01', 3636363636),
(8, 'debarunlahiri2016@gmail.com', 'password', 'Debarun Lahiri', '2018-11-04', 9205225428),
(9, 'debarunlahiri2017@gmail.com', 'password', 'Debarun Lahiri', '2018-11-11', 9205225428);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `uid` int(11) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `address_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_category`
--
ALTER TABLE `all_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `all_s_cat`
--
ALTER TABLE `all_s_cat`
  ADD PRIMARY KEY (`s_cat_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `order_confirmed`
--
ALTER TABLE `order_confirmed`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_category`
--
ALTER TABLE `all_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `all_s_cat`
--
ALTER TABLE `all_s_cat`
  MODIFY `s_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `order_confirmed`
--
ALTER TABLE `order_confirmed`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
