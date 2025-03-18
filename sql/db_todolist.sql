-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 08:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'work'),
(2, 'personal'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id_todo` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','done') NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bookmark` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id_todo`, `title`, `description`, `created_at`, `updated_at`, `status`, `id_category`, `id_user`, `bookmark`) VALUES
(1, 'aaa', 'aaa', '2025-03-17 04:38:20', '2025-03-17 04:38:20', 'pending', 3, 1, 0),
(7, 'sss', 'sss', '2025-03-17 07:26:08', '2025-03-17 07:26:08', 'done', 2, 1, 0),
(8, 'yyy', 'yyy', '2025-03-17 07:42:42', '2025-03-17 07:42:42', 'pending', 2, 1, 0),
(9, 'fff', 'fff', '2025-03-17 07:43:55', '2025-03-17 07:43:55', 'pending', 3, 1, 0),
(10, 'zzz', 'zzz', '2025-03-17 07:44:19', '2025-03-17 07:44:19', 'done', 1, 1, 0),
(11, 'sss', 'sss', '2025-03-18 00:43:27', '2025-03-18 00:43:27', 'done', 1, 2, 0),
(12, 'yyy', 'halo', '2025-03-18 00:43:43', '2025-03-18 00:43:43', 'pending', 2, 2, 0),
(13, 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', '2025-03-18 02:46:19', '2025-03-18 02:46:19', 'done', 3, 2, 1),
(14, 'fff', 'ffffffffffffffffffffffffffffffff', '2025-03-18 04:13:55', '2025-03-18 04:13:55', 'pending', 3, 2, 0),
(15, 'iii', 'iiiiii', '2025-03-18 04:31:19', '2025-03-18 04:31:19', 'pending', 1, 2, 0),
(16, 'Hallo, Syafira!', 'Semangat!', '2025-03-18 05:00:20', '2025-03-18 05:00:20', 'pending', 2, 2, 1),
(17, 'Haloooo', 'ajhdjsandjxsgbdhb', '2025-03-18 06:16:33', '2025-03-18 06:16:33', 'done', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `birth_date`) VALUES
(1, 'aaa', 'aaa', 'aaa', 'aaa@mail.com', '2025-03-06'),
(2, 'bbb', '$2y$10$m7DcEzJ1P.U2oHu.Pv3jFeQuA4zaMa.4wx0Dn1XLwTTjV3EnTzp4S', 'bbb', 'bbb@mail.com', '2025-03-12'),
(3, 'syafira', '$2y$10$HGQ5tZlcWhj8Pwq605d4ve.QfnPEWK3kHRldiiVN51QAlP.5CUcFC', 'syafira', 'syafira@mail.com', '2025-03-12'),
(4, 'azizah', '$2y$10$ATmFu.NRpl8OJejdgmCiTue4J9ngRmC.e/3UBOj6jhlXjmZ0rn1Ca', 'azizah', 'azizah@mail.com', '2025-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id_todo`),
  ADD KEY `category` (`id_category`),
  ADD KEY `user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id_todo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
