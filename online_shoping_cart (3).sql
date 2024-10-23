-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3377
-- Generation Time: Jan 18, 2024 at 07:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shoping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `Cart_Id` int(8) NOT NULL,
  `Customer_Id` int(8) NOT NULL,
  `Product_Id` int(8) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Price` int(50) NOT NULL,
  `Total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `Category_Id` int(8) NOT NULL,
  `Category_Name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`Category_Id`, `Category_Name`) VALUES
(1, 'Wishing Card'),
(2, 'Watches'),
(3, 'Gents Wallets'),
(4, 'Cosmetics'),
(5, 'Ladies Bags'),
(6, 'Perfumes');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `Contact_Id` int(11) NOT NULL,
  `Customer_Id` int(8) NOT NULL,
  `E_Mail` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`Contact_Id`, `Customer_Id`, `E_Mail`, `Subject`, `Message`) VALUES
(1, 3, 'ahmedidrees247@gmail.com', 'Rate Problem', 'Your Cosmetics Item Is Very High ');

-- --------------------------------------------------------

--
-- Table structure for table `customers_table`
--

CREATE TABLE `customers_table` (
  `Customer_Id` int(8) NOT NULL,
  `Customer_Name` varchar(250) NOT NULL,
  `E_Mail` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `token` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`Customer_Id`, `Customer_Name`, `E_Mail`, `Password`, `token`) VALUES
(3, 'Rizwan Hanif', 'ahmedidrees247@gmail.com', '$2y$10$mmLTeKRNrEPEr6tjQGOD5.ZE2nWvGI.dIh/.v6yQc3eF3rIljuEo6', 63),
(4, 'Muhammad Asad', 'asad@gmail.com', '$2y$10$EbS7KssdalliHQBCvM5yOOJTHLb5a50ikIWunB/AWdwGwSkP0E97e', 62589),
(6, 'Muhammad Ahmed', 'ahmedidrees22444@gmail.com', '$2y$10$dNoAOyQJ5.7cqUiujysD6OtwiP92pMqfiMN4kLK0LCBR42VWUMcFy', 5),
(7, 'Abdul Basit', 'basit@gmail.com', '$2y$10$FKixH971ToKkh6sI89W4zOaGgY2/CmHwlK0mf.JeSJm7iJxRYo4Bm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_card_details`
--

CREATE TABLE `customer_card_details` (
  `card_id` int(11) NOT NULL,
  `Holder_Name` varchar(250) NOT NULL,
  `Card_No` bigint(16) NOT NULL,
  `Expiry` date NOT NULL,
  `CVC` int(4) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Order_Code` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_card_details`
--

INSERT INTO `customer_card_details` (`card_id`, `Holder_Name`, `Card_No`, `Expiry`, `CVC`, `Customer_Id`, `Order_Code`) VALUES
(3, 'Muhammad Ahmed', 3332224446666, '2012-08-25', 4465, 4, 1704745561607475),
(7, 'Muhammad Ahmed', 3332224446666, '2024-01-31', 6666, 4, 1704863379803008),
(8, 'Muhammad Ahmed', 3332224446666, '2024-01-31', 6666, 4, 1704863379803008),
(9, 'Muhammad Idrees', 3332221116666, '2024-02-10', 4666, 4, 1704863379803008),
(10, 'Muhammad Idrees', 5566656565632652, '2025-03-10', 5655, 3, 1704855557892263),
(11, 'Muhammad Asad', 9658741236994699, '2024-09-12', 5648, 4, 1705035940559529),
(12, 'Muhammad Asad', 9658741236994699, '2024-09-12', 4654, 4, 1705038957661893),
(13, 'Muhammad Idrees', 3332221116666, '2024-01-19', 5555, 3, 1705040877732551),
(14, 'Muhammad Asad', 3332224446666, '2025-02-12', 9769, 4, 1705061554930150),
(15, 'Rizwan', 8989785415213565, '2025-01-12', 2321, 3, 1705028190995383),
(16, 'Abdul Basit', 1236548965666696, '2025-03-15', 7895, 7, 1705297675797958),
(17, 'Muhammad Ahmed', 4566547899874455, '2026-01-15', 9874, 3, 1705336682835933),
(18, 'Muhammad Ahmed', 8989785415213565, '2027-06-17', 7899, 6, 1705443293735951),
(19, 'Muhammad Ahmed', 2555555555555555, '2024-08-18', 4565, 3, 1705593673284069);

-- --------------------------------------------------------

--
-- Table structure for table `employees table`
--

CREATE TABLE `employees table` (
  `Employees_Id` int(8) NOT NULL,
  `Employees_Name` varchar(250) NOT NULL,
  `E-Mail` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Employees_Role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees table`
--

INSERT INTO `employees table` (`Employees_Id`, `Employees_Name`, `E-Mail`, `Password`, `Employees_Role`) VALUES
(1, 'Muhammad Ahmed', 'ahmedidrees247@gmail.com', 'ahmed123', 'Admin'),
(2, 'Qasim Mustafa', 'qasim75@gmail.com', 'qasim75', 'Employee'),
(3, 'Haseeb Ahmed', 'haseeb402@gmail.com', 'haseeb204', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `faq_table`
--

CREATE TABLE `faq_table` (
  `Faq_Id` int(8) NOT NULL,
  `Question` varchar(250) NOT NULL,
  `Answer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_table`
--

CREATE TABLE `feedbacks_table` (
  `Feedback_Id` int(8) NOT NULL,
  `Customer_Id` int(8) NOT NULL,
  `Feedback_Date` varchar(250) NOT NULL,
  `Feedback_text` varchar(250) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks_table`
--

INSERT INTO `feedbacks_table` (`Feedback_Id`, `Customer_Id`, `Feedback_Date`, `Feedback_text`, `Name`) VALUES
(2, 3, '10 - January - 2024 ', '\"I absolutely love my purchase! The quality is outstanding, and it arrived faster than expected. Will definitely be shopping here again!\"', 'Muhammad Ahmed'),
(3, 3, '10 - January - 2024 ', '\"These products exceeded my expectations. Great value for money, and the customer service was excellent. Highly recommended!\"', 'Rizwan Hanif'),
(4, 4, '11 - January - 2024 ', '\"Amazing experience! The website is user-friendly, and the customer support team was incredibly helpful. My order arrived on time, and the quality is top-notch.\"', 'Muhammad Asad'),
(5, 7, '15 - January - 2024 ', '\"These products exceeded my expectations. Great value for money, and the customer service was excellent. Highly recommended!\"', 'Abdul Basit');

-- --------------------------------------------------------

--
-- Table structure for table `order_tale`
--

CREATE TABLE `order_tale` (
  `Order_Id` int(8) NOT NULL,
  `Customer_Id` int(8) NOT NULL,
  `Order_Date` varchar(250) NOT NULL,
  `Delivery_type` varchar(250) NOT NULL,
  `Payment_type` varchar(250) NOT NULL,
  `Order_Status` varchar(250) NOT NULL DEFAULT 'Pending',
  `Order_Code` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tale`
--

INSERT INTO `order_tale` (`Order_Id`, `Customer_Id`, `Order_Date`, `Delivery_type`, `Payment_type`, `Order_Status`, `Order_Code`) VALUES
(9, 4, ' 8th - January - 2024 ', 'Home Delivery', 'VPP', 'Shipped', 1704727683268187),
(15, 4, ' 8th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704744337711293),
(16, 4, ' 8th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704745561607475),
(17, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704861314736964),
(18, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704863007466447),
(19, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1704863379803008),
(20, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704864651684235),
(21, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704854499955096),
(22, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704854809177179),
(23, 4, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1704855015918095),
(25, 3, ' 10th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1704855557892263),
(26, 4, ' 12th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705035940559529),
(27, 4, ' 12th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705038957661893),
(28, 3, ' 12th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705040877732551),
(29, 3, ' 12th - January - 2024 ', 'Pick Up', 'VPP', 'Shipped', 1705041091921406),
(30, 4, ' 12th - January - 2024 ', 'Home Delivery', 'Card', 'Dispatch', 1705061554930150),
(34, 3, ' 12th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705028190995383),
(35, 7, ' 15th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705297675797958),
(36, 3, ' 15th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705336682835933),
(37, 6, ' 16th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705443293735951),
(38, 3, ' 18th - January - 2024 ', 'Home Delivery', 'Card', 'Pending', 1705593463851587),
(39, 3, ' 18th - January - 2024 ', 'Home Delivery', 'Card', 'Shipped', 1705593673284069);

-- --------------------------------------------------------

--
-- Table structure for table `payments table`
--

CREATE TABLE `payments table` (
  `Payment_Id` int(8) NOT NULL,
  `Order_Id` int(8) NOT NULL,
  `Customer_Id` int(8) NOT NULL,
  `Payment_Date` date NOT NULL DEFAULT current_timestamp(),
  `Payment_Amount` int(100) NOT NULL,
  `Payment_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments table`
--

INSERT INTO `payments table` (`Payment_Id`, `Order_Id`, `Customer_Id`, `Payment_Date`, `Payment_Amount`, `Payment_type`) VALUES
(7, 19, 4, '2024-01-10', 152, 'Card'),
(8, 25, 3, '2024-01-10', 1616, 'Card'),
(9, 26, 4, '2024-01-12', 152, 'Card'),
(10, 27, 4, '2024-01-12', 45602, 'Card'),
(11, 28, 3, '2024-01-12', 1616, 'Card'),
(12, 30, 4, '2024-01-12', 45602, 'Card'),
(13, 34, 3, '2024-01-12', 1212, 'Card'),
(14, 35, 7, '2024-01-15', 202, 'Card'),
(15, 36, 3, '2024-01-15', 1515, 'Card'),
(16, 37, 6, '2024-01-17', 1515, 'Card'),
(17, 39, 3, '2024-01-18', 46056, 'Card');

-- --------------------------------------------------------

--
-- Table structure for table `products table`
--

CREATE TABLE `products table` (
  `Product_Id` int(8) NOT NULL,
  `Category_Id` int(8) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Price` int(50) NOT NULL,
  `Stock_Quantity` int(50) NOT NULL,
  `Warranty_Details` varchar(100) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products table`
--

INSERT INTO `products table` (`Product_Id`, `Category_Id`, `Product_Name`, `Description`, `Price`, `Stock_Quantity`, `Warranty_Details`, `Image`, `Status`) VALUES
(1, 1, 'Birthday Wishing Card', ' A card that you send to someone on their birthday, with a picture on the front and greetings', 150, 50, 'No Warranty', '65846cd642a03.jpg', 1),
(2, 1, '4 Wishing Cards Set', 'an illustrated message that expresses, either seriously or humorously, affection, good will, or other sentiments.', 200, 50, 'No Warranty', '65957fb699f97.jpg', 1),
(3, 2, 'Apple Watch (Series-4)', '  Series 4 comes in two sizes — 40mm and 44mm – and also brings along a 30 percent larger display. ', 45000, 10, '5 year', '658476e80040a.jpg', 1),
(4, 2, 'Apple Watch (Series-8)', '41mm Smart Watch it\'s crack resistant, IP6X-certified dust resistant, and swimproof with WR50 water resistance. ', 105000, 10, '2 year', '658478d6082a5.jpg', 1),
(5, 6, 'Club De Nuit Perfume', 'it\'s is a sophisticated woody, spicy fragrance for men. It\'s invites a fresh opening of lemon, black currant, apple.', 8500, 10, 'No Warranty', '65847ae12e677.jpg', 1),
(6, 6, 'Dior Fahrenheit For Men', ' Although it can be a powerful scent, and a little heavy, it has an intoxication that is unique and classic the same time.', 41000, 10, 'No Warranty', '65847c25a146b.jpg', 1),
(7, 3, 'Exentri Wallet Black ', 'EXENTRI Wallet is a smart and elegant combination of wallet and card holder. Small in size, great in storage capacity. ', 1200, 20, 'No Warranty', '65847d602e95e.jpg', 1),
(8, 3, 'Curewe Kerein Wallet', 'A flat, folding pocketbook, especially one large enough to hold paper money, credit cards, driver\'s license, etc.', 1100, 20, 'No Warranty', '65847e437a71b.jpg', 1),
(9, 5, 'Danbaoly  Ladies Bags', 'a bag, often with a handle or strap over the shoulder, used by women to carry money, keys, and small personal items', 1200, 10, 'No Warranty', '65848073a25e7.jpg', 1),
(10, 5, 'Crossbody Ladies Bag', 'A cross-body bag with a long strap worn diagonally across the body, with the bag hanging from the opposite side at height', 1000, 10, 'No Warranty', '658481a6a6d49.jpeg', 1),
(11, 4, 'Top Face HD Foundation ', 'It\'s Foundation  is a liquid or powder that is used on the face and neck to create a smooth and uniform complexion.', 2500, 10, 'No Warranty', '658484bc4b52f.jpg', 1),
(12, 4, 'ECO Soul Bounce Powder', 'A vegan foundation with a silky and light texture that adheres thinly and delicately to create clean and smooth skin.', 1500, 10, 'No Warranty', '658486deb806c.jpg', 1),
(13, 4, 'Miss Rose 12 Eyeshadow ', 'Miss Rose 12 Color Eyeshadow Palette Shimmer and 6 Color Glitter Eyeshadow has unique shades perfect for any day. ', 750, 20, 'No Warranty', '658489760dd8d.jpg', 1),
(14, 4, 'Final Touch 26 Eyeshadow', 'Eye-shadow is waterproof, sweat-proof, and has long-lasting features that make you keep perfect makeup all day.', 1500, 10, 'No Warranty', '65848adac5d3a.jpg', 1),
(15, 4, 'Kikio Milano Lipstick Kit', 'Looking for a striking red lipstick or nude,more natural shade? At KIKO, you\'ll find liquid,waterproof, creamy lipsticks.', 4500, 10, 'No Warranty', '65848c705d0dc.jpg', 1),
(16, 4, 'Golden Pearl Cream', 'Lightens your overall complexion, redu-\r\nces dark spots by minimizing melanin production, keeps your skin healthy.', 400, 10, 'No Warranty', '65848ce3a6561.jpg', 1),
(17, 1, 'Godiva Choclate', 'Godiva Ingredients. Our chocolate is made with a very special recipe. We scour the globe to find incredible cocoa.', 1850, 50, 'No Warranty', '65a4b7a652273.jpg', 1),
(18, 2, 'Apple Watch (Series-9) ', ' Activity rings show your daily activity, including your active calories, total steps, and workouts completed. ', 120000, 10, '2 years', '65a4b97e578df.jpg', 1),
(19, 3, 'Visconti Wallet', 'These wallets have the RFID protection, it is a precision applique work with drilled rubber backed lining.', 800, 20, 'No Warranty', '65a4ba6a73840.jpg', 1),
(20, 5, 'Aidebam bags', 'A bag or box of leather, fabric, plastic, or similar, held in the hand or carried by a handle or strap.', 8000, 25, 'No Warranty', '65a4bb4701533.jpeg', 1),
(21, 6, 'Sauvage Perfume', 'This cologne is crafted with notes of Calabrian bergamot for a burst of freshness and Amberwood for a woody finish.', 30000, 20, 'No Warranty', '65a4bc98a03ae.jpg', 1),
(22, 1, 'Godiva Belgium (1926)', 'exceptional quality and unique flavour combinations. Our secret? Creative chefs and quality ingredients.', 11000, 15, 'No Warranty', '65a4bd7ca5f95.jpg', 1),
(23, 2, 'Tommy Hilfiger', '  Watches use reliable and accurate movement, but they may not have theof complexity as luxury watch brands.', 1500, 25, 'No Warranty', '65a4beaf7ef99.jpg', 1),
(24, 3, 'Gianni Conti Wallet', 'Made with luxurious, smooth leather, Sandalwood wallet is a slim-line design to slip easily into pockets and bags.', 2000, 25, 'No Warranty', '65a4c2c3cd51c.jpg', 1),
(25, 5, 'Instant Luxury Bags', 'pieces of art that are crafted using high-quality materials, intricate designs, and exquisite detailing.', 1200, 20, 'No Warranty', '65a4c53f92353.jpg', 1),
(26, 6, 'Obsession Perfume', 'Topnotes – mandarin, vanillin Midnotes – jasmine, orange blossom, exotic spices Basenotes – oakmoss, musk, amber.', 9000, 20, 'No Warranty', '65a4c60595cd8.jpg', 1),
(27, 1, 'Godiva (1926) & Hot Cocoa', 'A heated drink consisting of shaved or melted chocolate or cocoa powder, heated milk or water, and sweetener.', 2000, 20, 'No Warranty', '65a550a4bb8f0.jpg', 1),
(28, 2, 'Timberland Watch', 'Timberland watches are known for their premium quality timepieces. The brand is known for its super-affordable  products.', 500, 25, 'No Warranty', '65a551c2cbf62.jpg', 1),
(29, 3, 'Louis Vuitton Wallet', 'With their slim silhouettes, Louis Vuitton\'s compact wallets for men slip easily into most pockets. ', 1200, 25, 'No Warranty', '65a55374484c7.jpg', 1),
(30, 5, 'Hub Leather Bags', 'Leather can be engineered to be durable enough for furniture yet soft enough for comfort footwear. ', 1500, 25, 'No Warranty', '65a554c477450.jpg', 1),
(31, 6, 'Prada Midnight Train', 'This is a floral, ambery perfume that reinvents freshness with neroli bud extract to capture the fresh scent of the flower.', 6000, 10, 'No Warranty', '65a555c5b3188.jpg', 1),
(32, 1, 'Mae Fine Chocolate', 'Bonbon means \"candy\" in French. a bonbon designate a French chocolate candy which is round on top, flat at the bottom.', 1500, 25, 'No Warranty', '65a559685057a.jpg', 1),
(33, 2, 'Seiko Chronograph Watch', 'A Seiko Chronograph watch is a timepiece that includes a stopwatch function in addition to telling the time. ', 2000, 25, 'No Warranty', '65a55b0a89edf.jpg', 1),
(34, 3, 'Bostanten Wallet', 'A good rule of thumb is that the central fold of the wallet should be as thick as two quarters for the two layers. ', 2000, 25, 'No Warranty', '65a55c9171944.jpg', 1),
(35, 5, 'Mini Luxury Bags', 'A small handbag, usually doesn\'t have straps or handles, it is designed to be carried under the arm or by hand. ', 1000, 20, 'No Warranty', '65a55dab55a4f.jpg', 1),
(36, 6, 'Prada Luna Rossa Ocean', 'The fragrance opens with a refreshing wave of zesty citrus fruits that gives way to spicy-woody incense notes. ', 8000, 25, 'No Warranty', '65a55e78621ae.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`Cart_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`Contact_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `customers_table`
--
ALTER TABLE `customers_table`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `customer_card_details`
--
ALTER TABLE `customer_card_details`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `Customer_Id` (`Customer_Id`),
  ADD KEY `Order_Code` (`Order_Code`);

--
-- Indexes for table `employees table`
--
ALTER TABLE `employees table`
  ADD PRIMARY KEY (`Employees_Id`);

--
-- Indexes for table `faq_table`
--
ALTER TABLE `faq_table`
  ADD PRIMARY KEY (`Faq_Id`);

--
-- Indexes for table `feedbacks_table`
--
ALTER TABLE `feedbacks_table`
  ADD PRIMARY KEY (`Feedback_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `order_tale`
--
ALTER TABLE `order_tale`
  ADD PRIMARY KEY (`Order_Id`),
  ADD UNIQUE KEY `Order_Code` (`Order_Code`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `payments table`
--
ALTER TABLE `payments table`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `Order_Id` (`Order_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- Indexes for table `products table`
--
ALTER TABLE `products table`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `Cart_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `Contact_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers_table`
--
ALTER TABLE `customers_table`
  MODIFY `Customer_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_card_details`
--
ALTER TABLE `customer_card_details`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employees table`
--
ALTER TABLE `employees table`
  MODIFY `Employees_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq_table`
--
ALTER TABLE `faq_table`
  MODIFY `Faq_Id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks_table`
--
ALTER TABLE `feedbacks_table`
  MODIFY `Feedback_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_tale`
--
ALTER TABLE `order_tale`
  MODIFY `Order_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payments table`
--
ALTER TABLE `payments table`
  MODIFY `Payment_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD CONSTRAINT `cart_table_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers_table` (`Customer_Id`),
  ADD CONSTRAINT `cart_table_ibfk_2` FOREIGN KEY (`Product_Id`) REFERENCES `products table` (`Product_Id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD CONSTRAINT `contact_table_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers_table` (`Customer_Id`);

--
-- Constraints for table `customer_card_details`
--
ALTER TABLE `customer_card_details`
  ADD CONSTRAINT `customer_card_details_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers_table` (`Customer_Id`),
  ADD CONSTRAINT `customer_card_details_ibfk_2` FOREIGN KEY (`Order_Code`) REFERENCES `order_tale` (`Order_Code`);

--
-- Constraints for table `feedbacks_table`
--
ALTER TABLE `feedbacks_table`
  ADD CONSTRAINT `feedbacks_table_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers_table` (`Customer_Id`);

--
-- Constraints for table `order_tale`
--
ALTER TABLE `order_tale`
  ADD CONSTRAINT `order_tale_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers_table` (`Customer_Id`);

--
-- Constraints for table `payments table`
--
ALTER TABLE `payments table`
  ADD CONSTRAINT `payments table_ibfk_2` FOREIGN KEY (`Customer_Id`) REFERENCES `customers_table` (`Customer_Id`),
  ADD CONSTRAINT `payments table_ibfk_3` FOREIGN KEY (`Order_Id`) REFERENCES `order_tale` (`Order_Id`);

--
-- Constraints for table `products table`
--
ALTER TABLE `products table`
  ADD CONSTRAINT `products table_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `category_table` (`Category_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
