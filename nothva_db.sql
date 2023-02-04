-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 05:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nothva_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `background` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `body`, `background`, `updated_at`) VALUES
(1, 'We are made from a dead heart. ', 'about-bg.jpg', '2023-01-30 16:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(2, 'nothva', 'd3ec5cb29bbfdf316f73dca598797521', 0);

-- --------------------------------------------------------

--
-- Table structure for table `era`
--

CREATE TABLE `era` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `cover` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `era`
--

INSERT INTO `era` (`id`, `name`, `slug`, `title`, `description`, `cover`, `active`, `created_at`, `updated_at`) VALUES
(1, '0', '0', 'Comeback From The Dead', '18 Sept. 2020, my soul is comeback. No feeling, no care, heartless, and brutal.  Bloody head, two eye, and nailed mouth. \r\nI can&#039;t say anything again. Beside that i&#039;m gonna destroy everything without say one word. Without say goodbye, i&#039;m gonna give you pain. ', 'cover_0.jpg', 0, '2023-01-28 00:20:49', '2023-01-30 15:32:44'),
(6, '1', '1', 'Keep Silent...', 'Keep Silent...Keep Silent...My mouth is closed, my eyes is closed but someday i force my self to open it, and it&#039;s so hard to to let go of all the restraints on my face. Blood is pouring all over my face. The past teach me  to keep silent when i happy, when i sad, when i cry.', 'cover_1.jpg', 0, '2023-01-30 12:36:04', '2023-01-30 15:55:41'),
(7, '2', '2', 'Two Face', 'Two Face...Better and better. I can speak anything. But to get respect i need to be a liar, anytime, anywhere. Then i can be accept to groups of peoples. It&#039;s not easy, but i now this is only one way to reach it. ', 'cover_2.jpg', 0, '2023-01-30 14:48:08', '2023-01-30 15:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `era_images`
--

CREATE TABLE `era_images` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `era_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `era_images`
--

INSERT INTO `era_images` (`id`, `image`, `active`, `era_id`, `created_at`, `updated_at`) VALUES
(1, '0_1.png', 0, 1, '2023-01-28 01:25:08', '2023-01-30 09:40:04'),
(10, 'IMG_20211031_185649.jpg', 0, 6, '2023-01-30 12:36:05', '2023-01-30 13:16:24'),
(12, 'IMG_20211031_185829.jpg', 0, 6, '2023-01-30 13:18:33', '2023-01-30 13:18:33'),
(14, 'IMG_20211016_184335.png', 0, 1, '2023-01-30 14:37:27', '2023-01-30 14:37:27'),
(15, 'IMG_20211016_1840571.png', 0, 1, '2023-01-30 14:39:07', '2023-01-30 14:39:07'),
(17, 'IMG_20211111_2047461.png', 0, 6, '2023-01-30 14:39:49', '2023-01-30 14:39:49'),
(18, 'IMG_20211112_183123.jpg', 0, 6, '2023-01-30 14:39:49', '2023-01-30 14:39:49'),
(20, 'IMG_20211120_162433.jpg', 0, 7, '2023-01-30 14:48:09', '2023-01-30 14:48:09'),
(21, 'IMG_20211120_162606.jpg', 0, 7, '2023-01-30 14:48:33', '2023-01-30 14:48:33'),
(22, 'IMG_20211125_224443.jpg', 0, 7, '2023-01-30 14:48:33', '2023-01-30 14:48:33'),
(23, 'IMG_20211202_184051.jpg', 0, 7, '2023-01-30 14:48:33', '2023-01-30 14:48:33'),
(24, 'IMG_20211016_184121.png', 0, 1, '2023-01-30 15:25:47', '2023-01-30 15:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `index_images`
--

CREATE TABLE `index_images` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `index_images`
--

INSERT INTO `index_images` (`id`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'index_1.jpg', 0, '2023-01-28 13:11:11', '2023-01-30 11:41:05'),
(11, 'index_2.jpg', 0, '2023-01-30 15:42:38', '2023-01-30 15:42:38'),
(12, 'index_12.jpg', 0, '2023-01-30 15:43:28', '2023-01-30 15:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `index_intro`
--

CREATE TABLE `index_intro` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `index_intro`
--

INSERT INTO `index_intro` (`id`, `body`, `updated_at`) VALUES
(1, 'Hi, this is our website. We just want to tell world our stories and our faces. Don&#039;t be afraid, it&#039;s not scary, is just an experience. ', '2023-01-30 15:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `preview` text NOT NULL,
  `episode` int(3) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `body`, `preview`, `episode`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Comeback From The Death', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt a quisquam odit ut inventore facere ducimus libero asperiores culpa eius neque ipsam rem perferendis possimus accusamus, quod totam, quis quae labore hic veritatis quos tempora molestias maxime? Modi deserunt illum, mollitia non quas sit accusamus tempore odit ullam tenetur voluptatibus perferendis distinctio reiciendis asperiores laudantium sint doloremque veniam voluptatum repellat nam molestias corporis? Hic ipsam qui, nesciunt et commodi veniam deserunt iure tenetur itaque cupiditate. Iste, eius dolorum. Autem, quas. Odio vitae porro ipsa eveniet. Doloremque at, repellat iusto molestias vero aspernatur deleniti hic optio similique eius sequi officiis libero.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, et?Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ab!', 1, 0, '2023-01-28 06:07:01', '2023-01-28 06:11:35'),
(2, 'Keep Silent...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus nulla quae beatae ad, quas amet odio aut fuga excepturi vero nihil exercitationem neque! Ad minus ducimus sunt dolore ullam! Modi fuga blanditiis quasi voluptatem eligendi commodi labore distinctio eos. Officiis nesciunt consectetur doloribus architecto similique provident ducimus? Tenetur labore inventore ab omnis exercitationem ratione velit necessitatibus sequi fuga, veniam cumque laboriosam quia consequuntur quidem vero sapiente perspiciatis minus, ullam dicta expedita nemo. Similique ad enim aperiam. Nostrum dolore iusto enim! Repudiandae optio non molestiae quis assumenda. Velit dolor nostrum quod perferendis vitae nisi autem quo, necessitatibus provident totam dicta!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, et?Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ab!', 2, 0, '2023-01-28 06:07:01', '2023-01-28 06:11:39'),
(6, 'Blood Everywhere', 'ALALALALALLALALAALAALA', 'ALALALALALLALALAALAALA', 3, 1, '2023-01-30 12:07:53', '2023-01-30 16:03:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `era`
--
ALTER TABLE `era`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `era_images`
--
ALTER TABLE `era_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `era_id` (`era_id`);

--
-- Indexes for table `index_images`
--
ALTER TABLE `index_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_intro`
--
ALTER TABLE `index_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `episode` (`episode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `era`
--
ALTER TABLE `era`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `era_images`
--
ALTER TABLE `era_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `index_images`
--
ALTER TABLE `index_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `index_intro`
--
ALTER TABLE `index_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `era_images`
--
ALTER TABLE `era_images`
  ADD CONSTRAINT `era_images_ibfk_1` FOREIGN KEY (`era_id`) REFERENCES `era` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
