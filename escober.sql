-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 07:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escober`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_contents`
--

CREATE TABLE `about_contents` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` varchar(500) NOT NULL,
  `about_image` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_contents`
--

INSERT INTO `about_contents` (`id`, `sub_title`, `title`, `desp`, `about_image`, `status`) VALUES
(18, 'Veniam quibusdam qu', 'Quasi quia pariatur', 'Autem distinctio Mi', '18.png', 0),
(20, 'bgfhfgnhg', 'Eveyone!', 'Rupamyiii8', '20.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_contents`
--

CREATE TABLE `banner_contents` (
  `id` int(11) NOT NULL,
  `sub_title` text NOT NULL,
  `title` text NOT NULL,
  `desp` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_contents`
--

INSERT INTO `banner_contents` (`id`, `sub_title`, `title`, `desp`, `status`) VALUES
(22, 'Hello! ', ' I am a Full Stack Web Developer', 'I am a Web Developer and I have a few years experience with PHP, MySQL, HTML, CSS, jQuery, WordPress', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(110) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `banner_image`, `status`) VALUES
(5, '5.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands_logo`
--

CREATE TABLE `brands_logo` (
  `id` int(11) NOT NULL,
  `brands_logo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands_logo`
--

INSERT INTO `brands_logo` (`id`, `brands_logo`, `status`) VALUES
(15, '15.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`) VALUES
(1, 'Md.Al kafi', 'rupam272@gmail.com', 'This awesome!'),
(2, 'Md.Al kafi', 'rupam272@gmail.com', 'This awesome!'),
(3, 'Md.Al kafi', 'rupam272@gmail.com', 'iydgkluwgjrlwegkjeb'),
(4, '', '', ''),
(5, '', '', ''),
(6, 'Beau Howell', 'pumaq@mailinator.com', 'Dolore animi nulla '),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_info`
--

CREATE TABLE `contacts_info` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts_info`
--

INSERT INTO `contacts_info` (`id`, `address`, `number`, `email`, `status`) VALUES
(15, 'Rahman Villa, 112/A,', 1626359787, 'rupam272@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(100) NOT NULL,
  `fact_count_number` int(100) NOT NULL,
  `fact_desp` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `icon_class`, `fact_count_number`, `fact_desp`, `status`) VALUES
(2, 'fa-behance-square', 600, 'Beeeeeeeeeeeee', 1),
(3, 'fa-facebook', 669, 'Facebook', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `designation`, `desp`, `image`) VALUES
(6, 'Malik Rivers', 'Noble Frye', 'Ab iusto corporis ad', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`, `status`) VALUES
(6, '6.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pportfolios`
--

CREATE TABLE `pportfolios` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pportfolios`
--

INSERT INTO `pportfolios` (`id`, `category`, `title`, `image`, `status`) VALUES
(4, 'Duigfbfv', 'Eligendi adipisicing', '4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desp` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon_class`, `title`, `desp`, `status`) VALUES
(1, 'fa-adjust', 'gthythyt', 'vfdsgdhrtg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desp` varchar(100) NOT NULL,
  `parcentage` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `desp`, `parcentage`, `status`) VALUES
(10, 'Html', 'The HyperText Markup Language.', 100, 1),
(21, 'In laboriosam ullam', 'Quia illum voluptat', 55, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `icon_class`, `link`, `status`) VALUES
(25, 'fa-area-chart', 'jyjdjy', 1),
(26, 'fa-area-chart', 'oipip', 1),
(28, 'fa-archive', 'fhf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_photo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_photo`, `status`, `role`) VALUES
(2, 'kafi', 'admin@gmail.com', '$2y$10$VtH0DwCR2vB421Qk7Rz2su3Hqbpy9E1vawPf7DfUDSLUrsgv4q5IO', '2.png', 1, 2),
(7, 'rupam', 'admin7@gmail.com', '$2y$10$n8CmkaEZOM3HrgjpRNzfLOAbEpbjyQci3zuYI4tKskXLtnAPc1RCu', '7.png', 0, 2),
(10, 'Athena Maynard', 'puhybyq@mailinator.com', '$2y$10$5w8DEMzHRKmAaoNtowIWuez7HN9S33PQk3akU8LOm/pn5zzz3WZAi', '10.png', 1, 0),
(11, 'Keegan Barrett', 'weresafyha@mailinator.com', '$2y$10$d/GR.imtSr3WSotxH2ZgeOzgdLyHquWbVJxDkWRn9WURutd3h17D.', '11.jpeg', 1, 0),
(12, 'modaretorrrrrrrrrr', 'modaretor@mail.com', '$2y$10$hhO8GPbLrD5E/GfdQ9Dv4.bDPhjUlnvV5wimzgtAFiXMEyc0ajHPq', '12.png', 0, 3),
(13, 'Dante Schmidt', 'gadyrodyhu@mailinator.com', '$2y$10$NbtYzCMICE.E8IVg4uO1tOLm9vu063xmTdtjgpgkftfTjACA3SpIG', '13.png', 1, 0),
(14, 'Graham Richardson', 'piqegyfa@mailinator.com', '$2y$10$hwZ/gRlbp4/YymBvtOT/4OuIDZeiQEsJGbIa0db3PalVLEh8du5CW', '14.jpg', 1, 0),
(15, 'Harding Branch', 'jojaliwinu@mailinator.com', '$2y$10$EVDuSRL25xq8WWkkUHQ/ReIJJviffCnKYiqlMG/Fgjbqn23XXjQiO', '15.png', 1, 0),
(16, 'Kelsey ', 'cekiva@mailinator.com', '$2y$10$2z24xCK.vlwe1Kx4.1daougjSmC9Q77JG4/L3k9lAJ2Uh78Psk7FC', '16.png', 0, 0),
(17, 'Rudyard Knapp', 'xygykyf@mailinator.com', '$2y$10$NhKieY4KpnqiNZd4qXKwnueYRNNJdSbRaxv0VBVlubSLcwyGNiu7a', '17.jpg', 1, 0),
(18, 'Cullen Whitney', 'tefijyna@mailinator.com', '$2y$10$N6/ZPN3EhEiQlBvfUIJCZOwjbGOAO34jiKJLW8GrmzRXR4rpmuQ.O', '18.jpg', 0, 3),
(19, 'Clarke ', 'lyhyk@mailinator.com', '$2y$10$Lqau3k1vGDfc84YEheEYgeIqJqpnF2Y9X88nPcLyDVNTZblYj5DPG', '19.jpg', 1, 4),
(20, ' Tate', 'dalodimok@mailinator.com', '$2y$10$15P6aMG8qCqyY7JIr2EnrOBHBPHaX7Zzcswf5bv0M/fQD9z/3RwL6', '20.jpg', 1, NULL),
(21, 'MacKensie Dickson', 'admin2@mail.com', '$2y$10$b7lSBTxjUZr/W1s2tTNwPe8.xfSuLVlHCyOK4zuJhbWQY7KmI6zse', '21.jpg', 0, 2),
(22, 'Maris Bentley', 'lyco@mailinator.com', '$2y$10$YBVUKmRXAHhMvb5OgEkS7.idKhIaLwQnAaNUdgWRY.2M9evRcrmIa', '22.jpg', 0, NULL),
(23, 'Clark Sheppard', 'rybi@mailinator.com', '$2y$10$5fdzjEAccQ/J4pgcaxvMZuJgOS96x/iRW7oBfwL2iQVamO1Gmzwne', '23.png', 0, 3),
(24, 'Jorden Meyers', 'tatenacufi@mailinator.com', '$2y$10$J5zi6lToJFFTAp9cTK.x7evnpBpJOtil2kTWFBiVTXecRdWvuiee6', '24.png', 1, 4),
(26, 'superadmin', 'spadmin@gmail.com', '$2y$10$i2tfCUoYuc5Y9Hx/D.ia/uSXBp3fKpMyt8oA74ASWwaeGuz3gjRq6', '26.jpg', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_contents`
--
ALTER TABLE `about_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_contents`
--
ALTER TABLE `banner_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands_logo`
--
ALTER TABLE `brands_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_info`
--
ALTER TABLE `contacts_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pportfolios`
--
ALTER TABLE `pportfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_contents`
--
ALTER TABLE `about_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `banner_contents`
--
ALTER TABLE `banner_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands_logo`
--
ALTER TABLE `brands_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts_info`
--
ALTER TABLE `contacts_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pportfolios`
--
ALTER TABLE `pportfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
